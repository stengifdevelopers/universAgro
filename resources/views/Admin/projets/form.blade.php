                    @csrf
                    <div class="form-group">
                        <label for="libelle">Libelle du projet</label>
                        <input id="libelle" class="form-control form-control-md @error ('libelle') is-invalid @enderror" name="libelle"
                        type="text" placeholder="Insérer un libelle" value="{{isset ($projet) ?  $projet->libelle : old('libelle')}} ">
                        @error ('libelle')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                        </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea3">Description du projet</label>
                        <textarea name="description" class="form-control text-justify @error ('description') is-invalid @enderror" id="exampleFormControlTextarea3" placeholder="Insérer une description" rows="7">{!! isset ($projet) ?  $projet->description : old('description')  !!}</textarea>
                        @error ('description')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="tof" class="h6">Photo</label><br>
                        <input type="file" accept="image/*" name="image"   value="{{ isset ($projet) ? $projet->image : old('image') }}" id="tof" class="text-center center-block file-upload form-control @error ('image') is-invalid @enderror">
                        @error ('image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                      </div>
