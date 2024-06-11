<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Affichage le contenu de la base
    public function index(){
        //Task::factory()->count(15)->create();
        $tasks = Task::all()->paginate(2);
        //var_dump($tasks);
        return view('home', compact('tasks'));
    }

    // Enregistrement de mes données en base
     /*****
     * Méthode pour enregistrer une tâche
     * dans la base de données
     *
     */
    public function create(Request $request): RedirectResponse {
        $request->validate([
            'title' => 'required | min:5'
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->status = 'n';
        $task->save();

        // dd()
        //dd($request);
        return redirect('/');
        //return view('accueil');
    }

    // Mise à jour d'une tâche dans la base
    /***************************************
     * Mettre à jour une tâche
     * à partir de son Id = $id
     *
     */
    public function update($id){
        // Recherche de la tâche en fonction de son $id
        $task = Task::find($id);
        // Affectation de la modification
        $task->status = true;
        // Mise à jour de la tâche
        $task->save();
        //dd('update ici', $id, $Task->status);
        // retour vers la page d'accueil
        return redirect('/');
    }

    // Suppression d'une tâche dans la base
    /***************************************
     * Supprimer une tâche
     * à partir de son Id = $id
     *
     */
    public function delete($id){
        // Recherche de la tâche en fonction de son $id
        $task = Task::find($id);
        // Suppression de la tâche
        $task->delete();
        // retour vers la page d'accueil
        return redirect('/');
    }
}
