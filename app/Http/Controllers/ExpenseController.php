<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\StoreExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $user = Auth::user();
        $expenses = Auth::user()->expenses()->with('category')->latest()->get();

        return Inertia::render('Spending/SpendingIndex', [
            'expenses' => $expenses,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $user = Auth::user();

        $userCategories = Category::where('user_id', $user->id)
                                    ->pluck('name'); 
        return Inertia::render('Spending/SpendingCreate', [
            'user' => $user,
            'categories' => $userCategories, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        $user = Auth::user();

        $validatedData = $request->validated();

        $category = Category::firstOrCreate([
            'name' => $validatedData['category'],
            'user_id' => $user->id,
        ]);

        $newExpense = Expense::create([
            'title'=> $validatedData['title'],
            'amount'=> $validatedData['amount'],
            'category_id'=> $category->id,
            'user_id'=> $user->id,
            'notes'=> $validatedData['notes'],
            'spent_on'=> $validatedData['spent_on'],
        ]);

        return redirect()->route('expenses.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return Inertia::render('Spending/SpendingShow', [
            'expense'=> $expense
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return Inertia::render('Spending/SpendingEdit', [
            'expense'=> $expense,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $deletedPost = $expense->delete();

        return redirect()->route('expenses.index');
    }
}
