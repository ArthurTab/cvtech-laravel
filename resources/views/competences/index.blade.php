{{-- Directive blade spécifiant l'héritage : --}}
@extends('cvtechque')

{{-- Directive blade spécifiant l'héritage : --}}
@section('contenu')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl bg-slate-850 shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="text-white">{{$tablename ?? ''}}</h6>
                </div>
                @if(session('succes'))
                    <div class="w-full mx-4 p-4 bg-red-200 text-white">{{session('succes')}}</div>
                @endif
                <a href="{{route('competences.create')}}" class="bg-white rounded-lg p-2 text-center text-black w-24 mx-6">Créer</a>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse border-white/40 text-slate-500">
                            <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    ID
                                </th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Intitulé
                                </th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Description
                                </th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none border-white/40 text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($competences as $c)
                                <tr>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xl font-bold leading-tight text-white text-slate-400">
                                            {{$c->id}}
                                        </p>
                                    </td>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight text-white text-slate-400">
                                            {{$c->intitule}}
                                        </p>
                                    </td>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs leading-tight text-white text-slate-400">
                                            {{$c->description}}
                                        </p>
                                    </td>
                                    <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b border-white/40 whitespace-nowrap shadow-transparent ">
                                        <div class="flex flex-row items-center justify-center space-x-2">
                                            <form action="{{route('competences.show', $c->id)}}" method="post">
                                                @csrf
                                                @method('GET')
                                                <button
                                                    class="!bg-green-900 text-white hover:bg-green-600 p-2 rounded-lg duration-200 hover:scale-110"
                                                    type="submit">Consulter
                                                </button>
                                            </form>
                                            <form action="{{route('competences.edit', $c->id)}}" method="post">
                                                @csrf
                                                @method('GET')
                                                <button
                                                    class="!bg-blue-900 text-white hover:bg-blue-600 p-2 rounded-lg duration-200 hover:scale-110"
                                                    type="submit">Modifier
                                                </button>
                                            </form>
                                            <form action="{{route('competences.destroy', $c->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="!bg-red-900 text-white hover:bg-red-600 p-2 rounded-lg duration-200 hover:scale-110"
                                                    type="submit">Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                Aucune compétence
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
