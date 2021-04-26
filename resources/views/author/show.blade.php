 <header class="quickview-header">
     <p class="title">Author view</p>
     <span class="delete" data-dismiss="quickview"></span>
 </header>
 <div class="quickview-body box">
     <div class="quickview-block">
         <figure class="image is-4by3">
             <img src="{{$author->picture}}" onerror="this.src='{{ asset('img/default_pic.png') }}'" alt='{{$author->name}}'>
         </figure>
         <div class="card">
             <div class="card-content">
                 <div class="media">
                     <div class="media-content">
                         <p class="title is-4">{{ $author->name }} {{ $author->surname }}</p>
                         <nav class="breadcrumb is-centered" aria-label="breadcrumbs">
                             <ul>
                                 <li class="is-active">Books written: {{ $author->getBooks->count()}}</li>
                             </ul>
                         </nav>
                     </div>
                 </div>
                 <div class="content">
                     <p>{!! $author->about !!}</p>
                 </div>
             </div>
             <footer class="card-footer">
                 <div class="is button is-outline is-link card-footer-item" data-dismiss='quickview'>Close</div>
             </footer>
         </div>
     </div>
 </div>
