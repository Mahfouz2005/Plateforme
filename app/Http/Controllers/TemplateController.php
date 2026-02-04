<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use Illuminate\Support\Facades\Storage;
class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
            return view('ajouttemplates');

    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $template = Template::all();
        $templates = Template::orderBy('created_at','desc')->get();
        return view('affichagetemplates',compact('templates'));
    }
   

    /**
     * Store a newly created resource in storage.
     */
public function store(StoreTemplateRequest $request)
{
    // On initialise les variables pour la base de données
    $imagePath = null;
    $dossierPath = null;

    // 1. Gestion de l'IMAGE
    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $image = $request->file('image');
        $nomImage = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('storage/images'), $nomImage);
        $imagePath = 'images/' . $nomImage;
    }

    // 2. Gestion du DOSSIER
    if ($request->hasFile('dossier') && $request->file('dossier')->isValid()) {
        $dossier = $request->file('dossier');
        $nomDossier = time() . '_' . $dossier->getClientOriginalName();
        $dossier->move(public_path('storage/fichiers'), $nomDossier);
        $dossierPath = 'fichiers/' . $nomDossier;
    }

    // 3. Enregistrement en base de données
    if ($imagePath && $dossierPath) {
        Template::create([
            'user_id'     => auth()->id(), // <--- AJOUTE CETTE LIGNE ICI
            'nom'         => $request->nom,
            'prenom'      => $request->prenom,
            'description' => $request->description,
            'prix'        => $request->prix,
            'statut'      => $request->statut,
            'categorie'   => $request->categorie,
            'langage'     => $request->langage,
            'image'       => $imagePath,
            'dossier'     => $dossierPath,
        ]);

        return redirect()->route('templates.index')->with('success', 'Template ajouté !');
    }

    return back()->withErrors(['erreur' => 'Impossible de déplacer les fichiers. Vérifiez les permissions du dossier storage.']);
}

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        //
         // On récupère l'ID de l'utilisateur connecté
        $userId = auth()->id(); 
        
        // On cherche tous les templates qui ont cet user_id
        $personneles = Template::where('user_id', $userId)->get();
        
        return view('templatepersonnel', compact('personneles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTemplateRequest $request, Template $template)
    {
        //
    }
    public function templatepersonnel(){
        return view('dashboard');
    }

    public function download($id)
    {
        $template = Template::findOrFail($id);

        // On récupère le chemin complet dans le dossier storage/app/public
        $pathToFile = storage_path('app/public/' . $template->fichier_path);

        // On vérifie si le fichier existe physiquement sur le disque
        if (file_exists($pathToFile)) {
            // response()->download() est une méthode native de Laravel très fiable
            return response()->download($pathToFile, $template->nom . '.zip');
        }

        return back()->with('error', 'Le fichier est introuvable sur le serveur.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        //
    }
    public function acceuil(){
        return view('acceuil');
    }
}
