    <table class="">
      <tr>
        <td>
          <a href="/posts/{{ $post->id }}/edit" class="btn btn-secondary btn-sm">Επεξεργασία</a>
        </td>
      </tr>
      <tr>
        <td>
          <form class="form" action="/posts/{{ $post->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-danger btn-sm">Διαγραφή</button>
          </form>
        </td>
      </tr>
    </table>
