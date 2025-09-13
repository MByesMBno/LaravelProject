<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\item;
use App\Models\category;
class ItemController extends Controller
{

    public function create(){
        $backUrl = route("item_list");
        return view("item_create", ['categories' => Category::all(), 'backUrl'=>$backUrl]);
    }
    public function show(Category $category,Item $item){
        $backUrl = route("category", $category);
        return view("item", compact('category','item', 'backUrl'));
    }
    public function list(Request $request){
        $category = Category::all();
        $perpage = $request->perpage ?? 2;
        $items = item::paginate($perpage)->withQueryString();
        $backUrl = route("category", $category);
        return view("item_list", compact('category','items','backUrl'));
    }
    public function store(Request $request)
    {
        if (! Gate::allows('create-item')) {
            return redirect('/error')->with('message', 'У вас нет разрешения на создание товаров');
        }

        $valid = $request->validate([
            'name' => 'required|unique:items|max:255',
            'tastes' => 'required|unique:items|max:255',
            'description' => 'required|unique:items|max:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'category_id' => 'integer'
        ]);

        $item = new Item($valid);
        $item->save();
        return redirect(route('validation'));
    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $backUrl = route("item_list");
        if (! Gate::allows('edit-item', $item)) {
            return redirect('/error')->with('message', 'У вас нет разрешения на редактирование товара номер ' . $id);
        }

        return view("item_edit", [
            'item' => $item,
            'categories' => Category::all(),
            'backUrl'=>$backUrl
        ]);
    }

    public function update(Request $request, string $id)
    {
        $item = Item::findOrFail($id);

        if (! Gate::allows('update-item', $item)) {
            return redirect('/error')->with('message', 'У вас нет разрешения на обновление товара номер ' . $id);
        }

        $valid = $request->validate([
            'name' => 'required|unique:items,name,'.$id.'|max:255',
            'tastes' => 'required|unique:items,tastes,'.$id.'|max:255',
            'description' => 'required|unique:items,description,'.$id.'|max:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'category_id' => 'integer'
        ]);

        $item->update($valid);
        return redirect(route('validation'));
    }

    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);

        if (! Gate::allows('destroy-item', $item)) {
            return redirect('/error')->with('message', 'У вас нет разрешения на удаление товара номер ' . $id);
        }

        $item->delete();
        return redirect(route('validation'));
    }
}
