<div class="text-center">
    <p>Valore del 1 al 5 el post. 1 muy negativo y 5 muy positivo.</p>
    <div class="flex items-center justify-center">
        @for ($i=1; $i <= $comments['score']; $i++)
            <svg wire:click="score({{$i}})"  aria-hidden="true" class="cursor-pointer w-10 h-10 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>
                
                @switch($i)
                @case($i == 1)
                      Malo
                    @break
                  @case($i == 2)
                      regular
                  @break
                  @case($i == 3)
                      Bueno
                  @break
                  @case($i == 4)
                      Muy bueno
                  @break
                  @case($i == 5)
                      Excelente
                  @break
                @default
                    
            @endswitch
            </title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        @endfor
        @for ($i=$comments['score'] + 1; $i<=5; $i++)
            <svg wire:click="score({{$i}})"  aria-hidden="true" class="cursor-pointer w-10 h-10 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>
                
                @switch($i)
                @case($i == 1)
                      Malo
                    @break
                  @case($i == 2)
                      regular
                  @break
                  @case($i == 3)
                      Bueno
                  @break
                  @case($i == 4)
                      Muy bueno
                  @break
                  @case($i == 5)
                      Excelente
                  @break
                @default
                    
            @endswitch
            </title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        @endfor
    </div>
</div>
<div class="py-2 px-4 bg-white rounded-lg rounded-t-lg border ">
    <textarea wire:model.defer="comments.description"  rows="6"
        class="px-0 w-full text-sm  border-0 focus:ring-0 focus:outline-none  "
        placeholder="Agregue algún comentario..." required></textarea>
        <x-jet-input-error for="comments.description" />
</div>