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
                            <a href="{{route('competences.index')}}"
                               class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="flex-auto p-6">
                        <div class="flex flex-wrap -mx-3">
                            <form action="{{route('competences.store')}}" method="post" role="form" class="w-full">
                                <div class="w-full max-w-full px-3 shrink-0 md:flex-0">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-4">
                                        <label for="intitule"
                                               class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 text-white">Intitulé</label>
                                        <input name="intitule" value="{{old('intitule')}}"
                                               class="focus:shadow-primary-outline bg-slate-850 text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"/>
                                        @error('intitule')
                                            <div class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full max-w-full px-3 shrink-0 md:flex-0 mb-4">
                                        <label for="description"
                                               class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 text-white">Description</label>
                                        <textarea rows="3" name="description"
                                                  class="focus:shadow-primary-outline bg-slate-850 text-white text-sm leading-5.6 ease block
                                              w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding
                                               px-3 py-2 font-normal outline-none transition-all
                                               placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">{{old('description')}}</textarea>
                                        @error('description')
                                        <div class="text-red-500 p-2 text-start w-full mx-6 rounded-lg my-1">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="p-2 bg-blue-500 text-white rounded-lg">Créer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
