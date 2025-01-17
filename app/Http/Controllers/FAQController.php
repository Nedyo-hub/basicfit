<?php

namespace App\Http\Controllers;

use App\Models\FaqEntry;
use App\Models\Category;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $categories = Category::with('faqs')->get();
        return view('faq.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all(); 
        return view('faq.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        FaqEntry::create($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ toegevoegd.');
    }

    public function edit(FaqEntry $faq)
    {
        $categories = Category::all();
        return view('faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, FaqEntry $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $faq->update($request->all());
        return redirect()->route('faq.index')->with('success', 'FAQ bijgewerkt.');
    }

    public function destroy(FaqEntry $faq)
    {
        $faq->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ verwijderd.');
    }
}