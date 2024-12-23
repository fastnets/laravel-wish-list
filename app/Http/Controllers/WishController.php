<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function index()
    {
        $wishes = auth()->user()->wishes;

        return view('wishes.index', compact('wishes'));
    }

    public function create()
    {
        return view('wishes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

 
        $wish = new Wish();
        $wish->title = $validated['title'];
        $wish->user_id = auth()->id(); 
        $wish->save();

        return redirect()->route('wishes.index');
    }
    public function destroy(Wish $wish)
    {
        // ѕроверка, что желание принадлежит текущему пользователю
        $this->authorize('delete', $wish);  // ƒл€ использовани€ политики (опционально, если нужна защита)
    
        // ”даление желани€
        $wish->delete();
    
        // ѕеренаправление на страницу со списком желаний
        return redirect()->route('wishes.index');
    }
    public function edit(Wish $wish)
    {
        // ѕровер€ем, что желание принадлежит текущему пользователю
        $this->authorize('update', $wish);
    
        return view('wishes.edit', compact('wish'));
    }
    
    public function update(Request $request, Wish $wish)
    {
        // ѕровер€ем, что желание принадлежит текущему пользователю
        $this->authorize('update', $wish);
    
        // ¬алидаци€ и обновление данных желани€
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $wish->update($request->all());
    
        return redirect()->route('wishes.index');
    }
    
    

}
