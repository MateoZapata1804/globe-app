<?php

namespace App\Http\Controllers;

use App\Http\Requests\BudgetRequest;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    /**
     * Obtiene un presupuesto por país
     */
    public function getBudgetByCountry(Request $req){
        $budgetList = Budget::all()->where('country_id','=',$req->countryId);

        return response($budgetList)->json();
    }

    /**
     * Obtiene la suma de todos los presupuestos registrados en la BD
     */
    public function getTotalBudget(){
        return response(DB::table('budgets')
            ->selectRaw('SUM(budget) as budget_total')
            ->first())->json();
    }

    /**
     * Crea un nuevo registro en la tabla budgets
     */
    public function createNewBudget(BudgetRequest $req){
        $newBudget = new Budget();
        $newBudget->country = $req->country;
        $newBudget->budget = $req->budget;
        $newBudget->initial_budget = $req->budget;

        if (!$newBudget->save())
            return response('No se pudo crear el presupuesto :(', 500)->json();
        
        return response('Presupuesto creado con éxito!')->json();
    }

    /**
     * Actualiza un registro de la tabla budgets
     */
    public function updateBudget(BudgetRequest $req){
        $newBudget = Budget::all()->where('id','=',$req->id)->first();
        $newBudget->budget = $req->new_budget;

        if (!$newBudget->update())
            return response('No fue posible actualizar el presupuesto', 500)->json();

        return response('Se cambió el presupuesto a '.$req->newBudget, 204)->json();
    }

    /**
     * Elimina un registro de la tabla budgets dado un id
     */
    public function deleteBudget($id){
        Budget::all()->where('id','=',$id)->delete();

        return response('Presupuesto eliminado correctamente')->json();
    }
}
