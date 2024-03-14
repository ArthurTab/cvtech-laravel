{{-- Directive blade spécifiant l'héritage : --}}
@extends('cvtechque')

{{-- Directive blade spécifiant l'héritage : --}}
@section('contenu')
    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl bg-slate-850 shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 text-white">{{$formname ?? ''}}</p>
                            <a href="{{route('professionnels.index')}}"
                               class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col w-full p-8 space-y-8">
                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Prénom</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->prenom}}</div>
                            </div>
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Nom</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->nom}}</div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Code postal</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->cp}}</div>
                            </div>
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Ville</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->ville}}</div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Téléphone</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->telephone}}</div>
                            </div>
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Adresse mail</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->email}}</div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Date de naissance</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->naissance}}</div>
                            </div>
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Formation</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 {{$pro->formation == 1 ? 'text-green-400' : 'text-red-500'}} w-full p-2">{{$pro->formation == 1 ? 'Oui' : 'Non'}}</div>
                            </div>
                        </div>
                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Domaine</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->domaine}}</div>
                            </div>
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Source</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->source}}</div>
                            </div>
                            <div class="flex flex-col w-full space-y-2">
                                <label for="prenom" class="text-white text-xl">Métier</label>
                                <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->metier->libelle}}</div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full space-y-2">
                            <label for="prenom" class="text-white text-xl">Observation</label>
                            <div class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">{{$pro->observation}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
