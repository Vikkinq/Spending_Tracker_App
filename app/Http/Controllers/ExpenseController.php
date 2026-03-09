<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;

class ExpenseController extends Controller
{
    // Index 
    public function index(){
        $user = Auth::user();
        $expenses = Auth::user()->expenses()->with('category')->latest()->get();

        return Inertia::render('Spending/SpendingIndex', [
            'expenses' => $expenses,
            'user' => $user,
        ]);
    }

    // Create Form
    public function create(){
        $user = Auth::user();

        $userCategories = Category::where('user_id', $user->id)
                                    ->pluck('name'); 
        return Inertia::render('Spending/SpendingCreate', [
            'user' => $user,
            'categories' => $userCategories, 
        ]);
    }

    // Create => Store Data
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

    // Show Page
    public function show(Expense $expense)
    {
        return Inertia::render('Spending/SpendingShow', [
            'expense'=> $expense
        ]);
    }

    // Edit Form Page
    public function edit(Expense $expense)
    {
        $user = Auth::user();
        $userCategories = Category::where('user_id', $user->id)->pluck('name'); 

        return Inertia::render('Spending/SpendingEdit', [
            'expense'=> $expense,
            'user'=> $user,
            'categories'=> $userCategories,
        ]);
    }

    // Edit => Update Data
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $user = Auth::user();

        abort_if($expense->user_id != $user->id,403);

        $validatedData = $request->validated();

        $category = Category::firstOrCreate([
            'name' => $validatedData['category'],
            'user_id' => $user->id,
        ]);

        $expense->update([
            'title'=> $validatedData['title'],
            'amount'=> $validatedData['amount'],
            'category_id'=> $category->id,
            'notes'=> $validatedData['notes'],
            'spent_on'=> $validatedData['spent_on'],
        ]);

        return redirect()->route('expenses.index');
    }

    // Delete Data
    public function destroy(Expense $expense)
    {
        $deletedPost = $expense->delete();

        return redirect()->route('expenses.index');
    }
}
