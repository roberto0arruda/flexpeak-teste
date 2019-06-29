<div class="form-group @error('nome')is-invalid @enderror">
    <label for="nome">Nome <sup style="color:red">*</sup>  </label>
    <input type="text" name="nome" id="nome" value="{{ isset($curso->nome) ? $curso->nome : old('nome') }}" class="form-control" placeholder="Nome do Curso" required>
    @error('nome')
        <p class="help-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="professor">Professor</label>
    <select name="professor_id" id="professor" class="form-control" required>
        @if ($formMode != 'create')
            @if(isset($professores[$curso->professor_id]))
            <option value="">{{$professores[$curso->professor_id]}}</option>
            @endif
        @endif
        @foreach ($professores as $key => $value)
        <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-success" value="{{ $formMode === 'create' ? 'cadastrar' : 'atualizar' }}">
</div>