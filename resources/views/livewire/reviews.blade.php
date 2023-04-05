<div>   
    <p class="ml-2 text-sm font-semibold text-gray-900">Comentarios:</p>
    @auth
 
        @if ($comment_edit!=1)
            <div class="grid grid-cols-1 gap-1  p-6">
                @include('livewire.reviews.partials.form')
                <div >
                    <button 
                        wire:click="save()" wire:loading.attr="disabled"
                        class="float-right disabled:opacity-25 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-sky-800 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Guardar
                    </button>
                </div>
            </div>
        @endif
      @else 
       <div >
        <a href="{{route('login')}}" class="float-right disabled:opacity-25 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-sky-800 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Opinar
        </a>
    </div>  
    @endauth

    <article>
        <div class="flex p-6 justify-between items-center mb-2">
           <div class="flex items-center">

          
            <span class="bg-blue-500 text-xs px-1 py-1  text-center  w-6 h-6 rounded-full text-white mx-auto "> 
                {{$rating_average_post}}
            </span>
            <div class="flex items-center mb-1" >
                    
                @for ($i=1; $i <= $rating_average_post; $i++)
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                @endfor
                @for ($i=$rating_average_post + 1; $i<=5; $i++)
                     <svg aria-hidden="true" class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>

                 @endfor
            </div>
            <span class="text-sm font-bold">  Basado en <strong>{{$comment_total_post}}</strong> comentarios </span>
           
        </div>
        </div>
        
        @foreach ($reviews as $review)

        <article class="m-4 block rounded-lg   p-6 shadow-lg" x-data ="{ edit :false }">
           <div>
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="{{$review->user->profile_photo_url}}"
                            alt="{{$review->user->name}}">{{$review->user->name}}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <time pubdate datetime="{{$review->created_at}}"
                            title="{{$review->created_at}}">
                            {{Carbon\Carbon::parse($review->created_at)->format('M. d, Y')}}</time></p>
                </div>
             @auth
                @if ($review->user->id == Auth::user()->id)
                    <div x-data="{ open: false }">
                        <button  x-on:click="open = !open "
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                </path>
                            </svg>
                        </button>
                        <div>
                            <div x-show.transition.in.duration.1000.origin.top.right="open === true"
                                class=" z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow absolute">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    >
                                    <li>
                                        <a wire:click="edit({{$review->id}})" x-on:click="edit = !edit , open = !open "  
                                            class="dark:text-gray-400 block cursor-pointer py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editar</a>
                                    </li>
                                    <li>
                                        <a wire:click="delete('{{$review->id}}')"  x-on:click="open = !open "
                                            class="dark:text-gray-400 block py-2 px-4 cursor-pointer hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">Eliminar</a>
                                    </li>
                                </ul>
                            </div>

                         </div>
                    </div>
                @endif
             @endauth
               
            </footer>
            <div x-show.transition.in.duration.1000.origin.top.right="edit === true"> 
                <div class="grid grid-cols-1 gap-1">
                    
                    @include('livewire.reviews.partials.form')
                    <div class="text-center">
                        <button 
                        x-on:click="edit = !edit , $wire.edit()"
                        
                        class="disabled:opacity-25 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-sky-800 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                         Cancelar
                    </button>
                        <button 
                            wire:click="update('{{$review->id}}')" wire:loading.attr="disabled"
                            class="disabled:opacity-25 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-sky-800 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                             Guardar
                        </button>
                    </div>
                </div>
               
            </div>
            <div x-show.transition.in.duration.1000.origin.top.right="edit === false">
                <div class="flex items-center mb-1" >
                    
                    @for ($i=1; $i <= $review->rating; $i++)
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                    @for ($i=$review->rating + 1; $i<=5; $i++)
                         <svg aria-hidden="true" class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
    
                     @endfor
                </div>
                <p class="text-gray-500 dark:text-gray-400">  {{$review->comment}}</p>
            </div>
           
          </div>
        </article>
      
       


        @endforeach
        <div class="card-footer">
            {{$reviews->links()}}
        </div>
    </article>
          
  
</div>
