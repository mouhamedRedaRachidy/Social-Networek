<x-master title="Publications">
   
    <div class="container w-75 mx-auto">
        @unless (count($publications)>0)
        <h2>pas publication</h2>
        @else
        @foreach ($publications as $publication)
                <x-publication  :publication='$publication'/>                
        @endforeach
    @endunless
    </div>
 
</x-master>