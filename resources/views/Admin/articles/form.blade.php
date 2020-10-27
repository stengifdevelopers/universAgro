@csrf
<div class="form-group">
<label for="nom">Nom de l'article</label>
<input id="nom" class="form-control form-control-md @error ('nom') is-invalid @enderror" name="nom"
type="text" placeholder="Insérer un nom" value="{{isset ($article) ?  $article->nom : old('nom')}} ">
@error ('nom')
    <div class="invalid-feedback">
        {{$message}}
    </div>
@enderror
</div>
<div class="form-group">
   <label for="exampleFormControlTextarea3">Description de l'article</label>
   <textarea name="description" class="form-control text-justify @error ('description') is-invalid @enderror" id="exampleFormControlTextarea3" placeholder="Inserer du texte ici"  rows="7">{!! isset ($article) ?  $article->description : old('description')  !!}</textarea>
   @error ('description')
   <div class="invalid-feedback">
       {{$message}}
   </div>
@enderror
</div>


<div class="row">
        <div class="col-lg-3">
         <div class="form-group">
            <label for="prix">Prix de l'article</label>
            <input id="prix" class="form-control form-control-md @error ('prix') is-invalid @enderror" name="prix"
            type="text"  value="{{ isset ($article) ? $article->prix : old('prix') }} ">
            @error ('prix')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
         </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
              <label for="prixRabais">Prix de rabais de l'article</label>
              <input id="prixRabais" class="form-control form-control-md @error ('prixRabais') is-invalid @enderror" name="prixRabais"
              type="text" value="{{isset ($article) ?  $article->prixRabais : (old('prixRabais') ?? 0) }} ">
              @error ('prixRabais')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
              @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
              <label for="pourcentRed">Pourcentage de reduction</label>
              <input id="pourcentRed" class="form-control form-control-md @error ('pourcentRed') is-invalid @enderror" name="pourcentRed"
              type="text"  value="{{isset ($article) ?  $article->pourcentRed : (old('pourcentRed') ?? 0)}} ">
              @error ('pourcentRed')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
              @enderror
          </div>
        </div>
        <div class="col-lg-3">
          <div class="form-group">
              <label for="quantite">Quantité</label>
              <input id="quantite" class="form-control form-control-md @error ('quantite') is-invalid @enderror" name="quantite"
              type="numeric"  value="{{isset ($article) ?  $article->quantite : (old('quantite') ?? 0) }} ">
              @error ('quantite')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
              @enderror
          </div>
        </div>
      </div>
      <label for="">Fichier Image</label>
      <div class="input-group mb-3">
        {{-- <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div> --}}
        <div class="custom-fil">
            <input type="file" class="custom-file-inpu @error ('fichier') is-invalid @enderror" name="fichier" id="profile-img" value="{{isset ($article) ?  $article->fichier : (old('fichier'))}} " aria-describedby="">
            {{-- <label class="custom-file-label" for="profile-img">Choose file</label> --}}
        </div>
        @error ('fichier')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
       </div>
       <div class="form-group">
        <label for="" class="mt-3">Nom de la catégorie </label>
        <select name="cat_id" id="" class="custom-select  @error ('cat_id') is-invalid @enderror">
            <option disabled selected>Choisir une catégorie...</option>
            @foreach ($categories as $categorie)
                <option value="{{$categorie->id}}" {{isset ($article) ? ($article->categories->id == $categorie->id ? 'selected' : ''):''}}  >{{$categorie->nom}}</option>
            @endforeach
        </select>
        @error ('cat_id')
        <div class="invalid-feedback">
            {{$message}}
        </div>
       @enderror
     </div>


     {{-- <input type="file" name="file" id="profile-img"> --}}

     <img src="" id="profile-img-tag" width="200px" />



     <script type="text/javascript">

         function readURL(input) {

             if (input.files && input.files[0]) {

                 var reader = new FileReader();



                 reader.onload = function (e) {

                     $('#profile-img-tag').attr('src', e.target.result);
                 }
                 reader.readAsDataURL(input.files[0]);
             }
         }

         $("#profile-img").change(function(){

             readURL(this);

         });

     </script>
