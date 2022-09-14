<div>
    <div class="col-12 mb-5">
        @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
        @endif
    </div>

   @foreach($contacts as $contact)
    <p>
        {{$contact->name}} - <livewire:contact.contact-delete :id="$contact->id" />    
    </p>
   @endforeach
</div>
