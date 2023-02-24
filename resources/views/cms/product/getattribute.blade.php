@if ($category)
    @foreach ($category->attributes as $attr)
        @if ($attr->type == 'text')
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <label>{{ $attr->name }}</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="{{ $attr->id }}" required
                               value="{{ isset($product) ? dataAttributeValue($attr, $product) : '' }}" class="form-control" />
                    </div>
                </div>
            </div>
        @endif
        @if ($attr->type == 'number')
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <label>{{ $attr->name }}</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" name="{{ $attr->id }}" required
                            value="{{ isset($product) ? dataAttributeValue($attr, $product) : '' }}" class="form-control" />
                    </div>
                </div>
            </div>
        @endif
        @if ($attr->type == 'numberfloat')
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <label>{{ $attr->name }}</label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" step="any" name="{{ $attr->id }}" required
                            value="{{ isset($product) ? dataAttributeValue($attr, $product) : '' }}" class="form-control" />
                    </div>
                </div>
            </div>
        @endif
        @if ($attr->type == 'select')
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <label>{{ $attr->name }}</label>
                    </div>
                    <div class="col-md-8">
                        <select name="{{ $attr->id }}" class="form-control">
                            @foreach (explode(';', $attr->value) as $value)
                                <option value="{{ $value }}"
                                    {{ isset($product) ? (checkDataAttributeValue($attr, $product, $value) ? 'selected' : '') : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
