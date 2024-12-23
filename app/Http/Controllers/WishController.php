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
        // ��������, ��� ������� ����������� �������� ������������
        $this->authorize('delete', $wish);  // ��� ������������� �������� (�����������, ���� ����� ������)
    
        // �������� �������
        $wish->delete();
    
        // ��������������� �� �������� �� ������� �������
        return redirect()->route('wishes.index');
    }
    public function edit(Wish $wish)
    {
        // ���������, ��� ������� ����������� �������� ������������
        $this->authorize('update', $wish);
    
        return view('wishes.edit', compact('wish'));
    }
    
    public function update(Request $request, Wish $wish)
    {
        // ���������, ��� ������� ����������� �������� ������������
        $this->authorize('update', $wish);
    
        // ��������� � ���������� ������ �������
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $wish->update($request->all());
    
        return redirect()->route('wishes.index');
    }
    
    

}
