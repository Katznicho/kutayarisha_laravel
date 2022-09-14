
  <td>
    @if ($approve==false)
    <a class="btn btn-success"
    href="{{ route('comments.approve', $id) }}">Approve</a>

    @else
    <a class="btn btn-danger"
    href="{{ route('comments.approve', $id) }}">Decline</a>
    @endif
    <a class="btn btn-primary"
    href="{{ route('comments.show', $id) }}">Show</a>

    <a class="btn btn-primary"
        href="{{ route('comments.edit', $id) }}">Edit</a>


</td>
