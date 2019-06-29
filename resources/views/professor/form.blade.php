<div class="form-group @error('nome')is-invalid @enderror">
    <label for="nome">Nome <sup style="color:red">*</sup>  </label>
    <input type="text" name="nome" id="nome" value="{{ isset($professor->nome) ? $professor->nome : old('nome') }}" class="form-control" placeholder="Nome Completo" required>
    @error('nome')
        <p class="help-block">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <div class="row">
        <div class="col-lg-6">
            <div class="formp-group @error('data_nascimento')is-invalid @enderror">
                <label for="data_nascimento">Nascimento <sup style="color:red">*</sup></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="{{ isset($professor->data_nascimento) ? $professor->data_nascimento : old('data_nascimento') }}" class="form-control" required>
                @error('data_nascimento')
                    <p class="help-block">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-success" value="{{ $formMode === 'create' ? 'cadastrar' : 'atualizar' }}">
</div>