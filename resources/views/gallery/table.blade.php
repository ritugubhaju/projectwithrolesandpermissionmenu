<tr>
    <td>{{++$key}}</td>
    <td>{{ Str::limit($gallery->title, 47) }}</td>
    <td>{{ Str::limit($gallery->album->title, 47) }}</td>
    <td>
    @if($gallery->is_published == 1)
     {{'Active'}}
    @else
    {{'Inactive'}}
    @endif
    </td>
    <td>
        <a href="{{route('gallery.edit', $gallery->id)}}">
            <button type="button" class="btn btn-icon-toggle btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="mdi mdi-pencil"></i>
            </button>
        </a>

        <button type="button" onclick="deleteThis(this); return false;" link="{{ route('gallery.destroy', $gallery->id) }}" class="btn btn-icon-toggle btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Delete"><i class="far fa-trash-alt"></i>
        </button>

    </td>
</tr>

