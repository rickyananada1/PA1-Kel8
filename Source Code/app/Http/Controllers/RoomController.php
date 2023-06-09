<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Category;
use Illuminate\Database\QueryException;

class RoomController extends Controller
{
    //Category 

    public function indexCategory()
    {
        $categories = Category::all();
        return view('Admin.category.index', compact('categories'));
    }


    public function createCategory()
    {
        return view('Admin.category.create');
        return view('Admin.category.create', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'gambar_kategori' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->price = $request->price;

        if ($request->hasFile('gambar_kategori')) {
            $imagePath = $request->file('gambar_kategori')->store('Category', 'public');
            $category->gambar_kategori = $imagePath;
        }
        $category->save();

        return redirect()->route('admin.category.index')
            ->with('success', 'Category created successfully.');
    }


    public function editCategory(Category $category)
    {
        return view('Admin.category.edit', compact('category'));
    }


    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'gambar_kategori' => 'image|mimes:jpeg,png,jpg',
        ]);

        $category->name = $request->name;
        $category->price = $request->price;

        if ($request->hasFile('gambar_kategori')) {
            $imagePath = $request->file('gambar_kategori')->store('Category', 'public');
            $category->gambar_kategori = $imagePath;
        }

        $category->save();

        return redirect()->route('admin.category.index')
            ->with('success', 'Category updated successfully');
    }


    public function destroyCategory(Category $category)
    {
        try {
            $category->delete();
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return redirect()->route('admin.category.index')
                    ->with('error', 'Tidak dapat dihapus karena adanya ketergantungan data.');
            } else {
                // Handle other query exceptions if needed
                return redirect()->route('admin.category.index')
                    ->with('error', 'Terjadi kesalahan saat menghapus kategori kamar.');
            }
        }
    
        return redirect()->route('admin.category.index')
            ->with('success', 'Kategori Kamar berhasil dihapus!');
    }
    public function indexCategoryPelanggan()
    {
        $categories = Category::all();
        return view('user.room', compact('categories'));
    }

    public function showList($category)
    {
        $categories = Category::all();
        $category = Category::where('name', $category)->firstOrFail();
        $rooms = Room::where('category_id', $category->id)->get();
        return view('user.room.list', compact('rooms', 'categories', 'category'));
    }

    //Room

    public function index()
    {
        $categories = Category::all();
        $rooms = Room::all();
        return view('Admin.room.index', compact('rooms', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('Admin.room.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'bunkbed' => 'required|in:Single Bed,King Size Bed,2 King Size Bed',
            'capacity' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $room = new Room();
        $room->name = $validatedData['name'];
        $room->category_id = $validatedData['category_id'];
        $room->bunkbed = $validatedData['bunkbed'];
        $room->capacity = $validatedData['capacity'];
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('Room', 'public');
            $room->gambar = $imagePath;
        }
        $room->save();

        return redirect()->route('admin.rooms.index')->with('success', 'Room added successfully.');
    }

    public function edit(Room $room)
    {
        $categories = Category::all();
        return view('admin.room.edit', compact('room', 'categories'));
    }

    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'bunkbed' => 'required|in:Single Bed,King Size Bed,2 King Size Bed',
            'capacity' => 'required',
            'category_id' => 'required|exists:categories,id',
            'gambar' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('Room', 'public');
            $room->gambar = $imagePath;
        }

        $room->name = $validatedData['name'];
        $room->bunkbed = $validatedData['bunkbed'];
        $room->capacity = $validatedData['capacity'];
        $room->category_id = $validatedData['category_id'];
        $room->save();

        return redirect()->route('admin.rooms.index')->with('success', 'Room has been updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room has been deleted successfully.');
    }
}
