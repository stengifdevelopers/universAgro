                @csrf
                <div class="form-group">
                <label for="titre">Titre de l'annonce <span class="font-weight-bold" style="color: red">*</span></label>
                <input id="titre" class="form-control form-control-md @error ('titre') is-invalid @enderror" name="titre"
                type="text" placeholder="Insérer un titre" value="{{isset ($annonce) ?  $annonce->titre : old('titre')}} ">
                @error ('titre')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea3">Description de l'annonce <span class="font-weight-bold" style="color: red">*</span></label>
                <textarea name="contenu" class="form-control text-justify @error ('contenu') is-invalid @enderror" id="exampleFormControlTextarea3" placeholder="Insérer un contenu" rows="7">{!! isset ($annonce) ?  $annonce->contenu : old('contenu')  !!}</textarea>
                @error ('contenu')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="choix[]" value="1"  class="custom-control-input" id="defaultUnchecked" onclick="myFunction2()" @if(is_array(old('choix')) && in_array(1, old('choix'))) checked @endif>
                    <label class="custom-control-label" for="defaultUnchecked">Location / Vente de terrain</label> <br>
                    <small class="text-muted">Si l'annonce concerne une vente ou une location de terrain, cochez l'option <span style="color: rgb(13, 236, 24)">Location / Vente de terrain</span></small>
                </div>
                <div class="row mt-4" id="text" style="visibility:hidden;height:0px;">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label for="localisation">Localisation <span class="font-weight-bold" style="color: red">*</span></label>
                            <input id="localisation" class="form-control form-control-md @error ('localisation') is-invalid @enderror" name="localisation"
                            type="text" value="{{isset ($annonce) ?  $annonce->localisation : old('localisation')}} ">
                            @error ('localisation')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="superficie">Superficie <span class="font-weight-bold" style="color: red">*</span></label>
                            <input id="superficie" class="form-control form-control-md @error ('superficie') is-invalid @enderror" name="superficie"
                            type="text" value="{{isset ($annonce) ?  $annonce->superficie : old('superficie')}} ">
                            @error ('superficie')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="price">Price <span class="font-weight-bold" style="color: red">*</span></label>
                            <input id="price" min="1" class="form-control form-control-md @error ('price') is-invalid @enderror" name="price"
                            type="number" value="{{isset ($annonce) ?  $annonce->price : old('price')}} ">
                            @error ('price')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"  value="{{ old('image') }}"> --}}
                </div>
                <div class="row" id="emailFirst">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="source">Source</label>
                            <input id="source" class="form-control form-control-md @error ('source') is-invalid @enderror" name="source"
                            type="text" value="{{isset ($annonce) ?  $annonce->source : old('source')}} ">
                            @error ('source')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="editeur">Editeur</label>
                            <input id="editeur" class="form-control form-control-md @error ('editeur') is-invalid @enderror" name="editeur"
                            type="text" value="{{isset ($annonce) ?  $annonce->editeur : old('editeur')}} ">
                            @error ('editeur')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <label class="mt-3" for="">Fichier <span class="font-weight-bold" style="color: red">*</span></label>
                        <div class="form-group input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error ('fichier') is-invalid @enderror" name="fichier" value="{{isset ($annonce) ?  $annonce->fichier : (old('fichier'))}}" id="inputGroupFile01 "  aria-describedby="">
                                <label class="custom-file-label " for="inputGroupFile01">{{(old('fichier'))}}</label>
                            </div>
                            @error ('fichier')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"  value="{{ old('image') }}"> --}}
                </div>
                <script>
                    // Material Select Initialization
                      $(document).ready(function() {
                      $('.mdb-select').materialSelect();
                      });
                  </script>
