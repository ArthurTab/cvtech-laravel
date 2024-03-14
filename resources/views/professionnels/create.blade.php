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
                            <p class="mb-0 text-white text-xl font-bold underline">{{$formname ?? ''}}</p>
                            <a href="{{route('professionnels.index')}}"
                               class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="flex-auto p-6">
                        <div class="flex flex-wrap -mx-3">
                            <form action="{{ route('professionnels.store')}}" method="post" role="form"
                                  class="w-full">
                                <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                    @csrf
                                    @method('POST')
                                    <div class="flex flex-col w-full p-8 space-y-8">
                                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="prenom" class="text-white text-xl">Prénom :</label>
                                                <input type="text" name="prenom" id="prenom" value="{{old('prenom')}}"
                                                       class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">
                                                @error('prenom')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="nom" class="text-white text-xl">Nom :</label>
                                                <input type="text" name="nom" id="nom" value="{{old('nom')}}"
                                                       class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">
                                                @error('nom')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="cp" class="text-white text-xl">Code postal :</label>
                                                <input type="text" name="cp" id="cp" value="{{old('cp')}}"
                                                       class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">
                                                @error('cp')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="ville" class="text-white text-xl">Ville :</label>
                                                <input type="text" name="ville" id="ville" value="{{old('ville')}}"
                                                       class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">
                                                @error('ville')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="telephone" class="text-white text-xl">Téléphone :</label>
                                                <input type="text" name="telephone" id="telephone" value="{{old('telephone')}}"
                                                       class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">
                                                @error('telephone')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="email" class="text-white text-xl">Adresse mail :</label>
                                                <input type="text" name="email" id="email" value="{{old('email')}}"
                                                       class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">
                                                @error('email')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                                            <div class="flex flex-col w-full space-y-4">
                                                <label for="domaine" class="text-white text-xl">Domaine :</label>
                                                <div class="flex flex-row w-full space-x-12 justify-start">
                                                    <div class="flex flex-row space-x-3 items-center">
                                                        <div class="text-white text-xl"> S :</div>
                                                        <input type="checkbox" name="domaine[]" value="S">
                                                    </div>
                                                    <div class="flex flex-row space-x-3 items-center">
                                                        <div class="text-white text-xl"> R :</div>
                                                        <input type="checkbox" name="domaine[]" value="R">
                                                    </div>
                                                    <div class="flex flex-row space-x-3 items-center">
                                                        <div class="text-white text-xl"> D :</div>
                                                        <input type="checkbox" name="domaine[]" value="D">
                                                    </div>
                                                </div>
                                                @error('domaine')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="formation" class="text-white text-xl">Formation :</label>
                                                <label
                                                    for="formation"
                                                    class="relative h-8 w-14 cursor-pointer rounded-full bg-gray-300 transition [-webkit-tap-highlight-color:_transparent] has-[:checked]:bg-green-500"
                                                >
                                                    <input
                                                        name="formation[]"
                                                        type="checkbox"
                                                        id="formation"
                                                        class="peer sr-only [&:checked_+_span_svg[data-checked-icon]]:block [&:checked_+_span_svg[data-unchecked-icon]]:hidden"
                                                    />

                                                    <span
                                                        class="absolute inset-y-0 start-0 z-10 m-1 inline-flex size-6 items-center justify-center rounded-full bg-white text-gray-400 transition-all peer-checked:start-6 peer-checked:text-green-600"
                                                    >
    <svg
        data-unchecked-icon
        xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4"
        viewBox="0 0 20 20"
        fill="currentColor"
    >
      <path
          fill-rule="evenodd"
          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
          clip-rule="evenodd"
      />
    </svg>

    <svg
        data-checked-icon
        xmlns="http://www.w3.org/2000/svg"
        class="hidden h-4 w-4"
        viewBox="0 0 20 20"
        fill="currentColor"
    >
      <path
          fill-rule="evenodd"
          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
          clip-rule="evenodd"
      />
    </svg>
  </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="naissance" class="text-white text-xl">Date de
                                                    naissance :</label>
                                                <input type="date" name="naissance" id="naissance" value="{{old('naissance')}}"
                                                       class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">
                                                @error('naissance')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="source" class="text-white text-xl">Source :</label>
                                                <input type="text" name="source" id="source" value="{{old('source')}}"
                                                       class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2">
                                                @error('source')
                                                <div
                                                    class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="flex flex-row w-full items-start justify-between space-x-24">
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="metier_id" class="text-white text-xl">Métier :</label>
                                                @if(!empty($metiers))
                                                    <select name="metier_id" id="metier_id" class="p-4 rounded-xl">
                                                        <option value="0">Tous
                                                            les métiers
                                                        </option>
                                                        @foreach($metiers as $m)
                                                            <option
                                                                value="{{$m->id}}">
                                                                {{$m->libelle}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('metier_id')
                                                    <div
                                                        class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                    @enderror
                                                @endif
                                            </div>
                                            <div class="flex flex-col w-full space-y-2">
                                                <label for="comp" class="text-white text-xl">Compétences (sélection multiple) :</label>
                                                @if(!empty($competences))
                                                    <select name="comp[]" id="comp" class="p-4 rounded-xl" multiple>
                                                        <option value="0" class="font-bold">Toutes
                                                            les compétences
                                                        </option>
                                                        @foreach($competences as $c)
                                                            <option
                                                                value="{{$c->id}}">
                                                                {{$c->intitule}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('comp')
                                                    <div
                                                        class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                                    @enderror
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full space-y-2">
                                            <label for="observation" class="text-white text-xl">Observation : </label>
                                            <textarea rows="5"
                                                      class="rounded-lg bg-gray-600 border border-gray-700 text-white w-full p-2"
                                                      name="observation"
                                                      id="observation">{{old('observation')}}</textarea>
                                            @error('observation')
                                            <div
                                                class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                            @enderror

                                        </div>

                                    </div>
                                    <button type="submit" class="p-2 bg-blue-500 text-white rounded-lg">Créer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
