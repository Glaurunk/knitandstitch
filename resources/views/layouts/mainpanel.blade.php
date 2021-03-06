@extends('layouts.dashboard')

@section('content')
      <table class="table table-striped table-responsive-md">
        <tbody>
          <tr>
            <td><strong>Stitches</strong></td>
            <td><a href="{{ url( '/posts/create') }}" class="">New Stitch</td>
            <td><a href="{{ url( '/admin/posts') }}" class="">Manage Stitches</a></td>
            <td></td>

          </tr>
          <tr>
            <td><strong>Knits</strong></td>
            <td><a href="/knits/create">New Knit</a></td>
            <td><a href="/admin/knits">Manage Knits</a></td>
            <td></td>
          </tr>
          <tr>
            <td><strong>Images</strong></td>
            <td>
              <a href="#" data-toggle="modal" data-target="#uploadPicture" style="cursor: pointer;">
              Upload New Image
              </a>
            </td>
            <td><a href="{{ url('/photos') }}">Image Gallery</a></td>
            <td><a href="{{ url('/carousel') }}">Manage Carousel</a></td>
          </tr>
          <tr>
            <td><strong>Users</strong></td>
            <td></td>
            <td><a href="{{ url('/users') }}">Manage Users</a></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

@include('layouts.self-destruct')

@endsection
