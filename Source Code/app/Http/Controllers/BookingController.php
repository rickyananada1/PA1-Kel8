<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Testimony;
use Carbon\Carbon;
use App\Models\User;


class BookingController extends Controller
{
    public function show($booking)
    {
        $room = Room::find($booking);

        if ($room) {
            $categories = Category::all();
            return view('user.booking.bookingIndex', compact('room', 'categories'));
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'nama' => 'required|string',
            'name' => 'required|string',
            'tanggal_checkin' => 'required|date',
            'tanggal_checkout' => 'required|date|after_or_equal:tanggal_checkin',
            'category_id' => 'required|exists:categories,id',
            'kategori_kamar' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'gambar_pembayaran' => 'nullable|image'
        ]);

        // Validasi pesanan kamar dengan tanggal yang tumpang tindih
        $request->validate([
            'room_id' => [
                'required',
                function ($attribute, $value, $fail) use ($validatedData) { //callback function yang dapat dipanggil jika validasi gagal.
                    $room = Room::findOrFail($validatedData['room_id']);
                    $checkinDate = Carbon::parse($validatedData['tanggal_checkin'])->format('Y-m-d');
                    $checkoutDate = Carbon::parse($validatedData['tanggal_checkout'])->format('Y-m-d');

                    $existingOrders = Order::where('room_id', $room->id)
                        ->where('tanggal_checkin', '<=', $checkoutDate)
                        ->where('tanggal_checkout', '>=', $checkinDate)
                        ->count();

                    if ($existingOrders > 0) {
                        $fail('Kamar ini sudah dipesan pada tanggal tersebut.');
                    }
                }
            ]
        ]);

        $order = new Order();
        $order->room_id = $validatedData['room_id'];
        $order->nama = $validatedData['nama'];
        $order->name = $validatedData['name'];
        $order->tanggal_checkin = $validatedData['tanggal_checkin'];
        $order->tanggal_checkout = $validatedData['tanggal_checkout'];
        $order->kategori_kamar = $validatedData['kategori_kamar'];
        $order->category_id = $validatedData['category_id'];
        $order->user_id = $validatedData['user_id'];

        if ($request->hasFile('gambar_pembayaran')) {
            $image = $request->file('gambar_pembayaran');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('public/booking');
            $image->move($destinationPath, $name);
            $validatedData['gambar_pembayaran'] = $name;
        } else {
            $validatedData['gambar_pembayaran'] = ''; // default kosong
        }

        $order->save();

        // Tambahkan notifikasi pesanan baru
        $notification = new Notification();
        $notification->message = 'Ada pesanan baru atau ada pesanan yang belum dikonfirmasi.';
        $notification->sender = 'system';
        $notification->receiver = 'admin';
        $notification->sent_at = now();
        $notification->save();

        return redirect()->route('user.orders.index')->with('success', 'Tunggu pesanan di approve Pihak Hotel.');
    }


    public function cancelBooking($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->delete(); // Menghapus pesanan dari database

        return redirect()->route('user.orders.index')->with('success', 'Pesanan telah dibatalkan.');
    }

    public function paymentForm($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('user.booking.paymentForm', compact('order'));
    }


    public function submitPayment(Request $request, $orderId)
    {

        $request->validate([
            'gambar_pembayaran' => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // Simpan berkas pembayaran ke dalam storage atau folder yang diinginkan
        $order = Order::findOrFail($orderId);
        if ($request->hasFile('gambar_pembayaran')) {
            $imagePath = $request->file('gambar_pembayaran')->store('payment_files', 'public');
            $order->gambar_pembayaran = $imagePath;
        }
        $order->save();
        // $order->gambar_pembayaran = $validatedData['bukti_pembayaran']->store('payment_files');

        // Tambahkan notifikasi pembayaran
        $notification = new Notification();
        $notification->message = 'Ada pesanan yang sudah dibayar.';
        $notification->sender = 'system';
        $notification->receiver = 'admin';
        $notification->sent_at = now();
        $notification->save();

        return redirect()->route('user.orders.index')->with('success', 'Bukti pembayaran berhasil dikirim.');
    }

    public function index()
    {
        $user = auth()->user();
        $userOrders = $user ? $user->orders : [];

        // Retrieve only the orders belonging to the authenticated user
        $filteredUserOrders = $userOrders->where('user_id', $user->id);

        return view('user.booking.orderList', [
            'userOrders' => $filteredUserOrders,
        ]);
    }

    public function approve($orderId)
    {
        // Mencari pesanan berdasarkan $orderId
        $order = Order::findOrFail($orderId);

        $order->status = 'Approved';
        $order->save();

        // Simpan notifikasi kepada pelanggan
        $notification = new Notification();
        $notification->message = 'Pesanan Anda telah diapprove.';
        $notification->sender = 'system';
        $notification->receiver = $order->user_id; // Menggunakan ID pelanggan yang memesan
        $notification->sent_at = now();
        $notification->save();

        return redirect()->route('admin.orders.list')->with('success', 'Pesanan telah diapprove.');
    }

    public function accessible($orderId)
    {
        // Mencari pesanan berdasarkan $orderId
        $order = Order::findOrFail($orderId);

        $order->status = 'Accessible';
        $order->save();

        // Simpan notifikasi kepada pelanggan
        $notification = new Notification();
        $notification->message = 'Segera bayar pesanan anda, sudah diberi akses.';
        $notification->sender = 'system';
        $notification->receiver = $order->user_id; // Menggunakan ID pelanggan yang memesan
        $notification->sent_at = now();
        $notification->save();

        return redirect()->route('admin.orders.list')->with('success', 'Pesanan telah diapprove.');
    }

    public function reject($orderId)
    {
        // Mencari pesanan berdasarkan $orderId
        $order = Order::findOrFail($orderId);

        $order->status = 'Rejected';
        $order->save();

        // Simpan notifikasi kepada pelanggan
        $notification = new Notification();
        $notification->message = 'Pesanan Anda telah ditolak.';
        $notification->sender = 'system';
        $notification->receiver = $order->user_id; // Menggunakan ID pelanggan yang terkait
        $notification->sent_at = now();
        $notification->save();

        return redirect()->route('admin.orders.list')->with('success', 'Pesanan telah ditolak.');
    }

    public function delete($orderId)
    {
        Order::destroy($orderId);

        return redirect()->route('admin.orders.list')->with('success', 'Pesanan telah dihapus.');
    }

    public function listOrder()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders')); //membuat array asosiatif yang kemudian digunakan dalam fungsi view() untuk meneruskan data ke tampilan
    }

    public function showNotifications()
    {
        $jumlahKamar = Room::count();
        $jumlahKategori = Category::count();
        $jumlahTestimony = Testimony::count();
        $today = Carbon::today();
        $todayCheckIns = Order::whereDate('tanggal_checkin', $today)
            ->where('status', 'approved')
            ->count();
        $availableRoomsCount = $jumlahKamar - $todayCheckIns;
        $customers = User::where('role', 'pelanggan')->get();
        $customerCount = User::where('role', 'pelanggan')->count();

        $adminNotifications = DB::table('notifications')
            ->where('receiver', 'admin')
            ->where('status', 'unread')
            ->distinct()
            ->select('id', 'message',)
            ->get();

        return view('admin.index', compact(
            'adminNotifications',
            'jumlahKamar',
            'jumlahKategori',
            'jumlahTestimony',
            'todayCheckIns',
            'availableRoomsCount',
            'customers',
            'customerCount'
        ));
    }

    public function markNotificationAsRead($notificationId)
    {
        DB::table('notifications')
            ->where('id', $notificationId)
            ->update(['status' => 'read']);

        return redirect()->route('admin.orders.list');
    }

    public function showNotifPelanggan()
    {
        $jumlahKamar = Room::count();
        $availableRooms = Room::all();
        $today = Carbon::today();
        $checkinReservations = Order::whereDate('tanggal_checkin', $today)
            ->where('status', 'approved')
            ->count();

        $availableRooms = $jumlahKamar - $checkinReservations;

        $notifications = [];

        if (auth()->check()) {
            $notifications = Notification::where('receiver', auth()->user()->id)
                ->where('status', 'unread')
                ->select('id', 'message')
                ->get();
        }

        return view('user.index', compact('jumlahKamar', 'notifications', 'availableRooms'));
    }


    public function markAsReadPelanggan($id)
    {
        $notification = Notification::find($id);

        if ($notification !== null) {
            $notification->status = 'read';
            $notification->save();
        }

        return redirect()->route('user.orders.index');
    }
}
