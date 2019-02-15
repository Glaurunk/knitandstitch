@extends('layouts.dashboard')

@section('content')
      <table class="table table-striped">
        <tbody>
          <tr>
            <td><strong>Δημοσιεύσεις</strong></td>
            <td><a href="{{ url( '/posts/create') }}" class="">Νέα Δημοσίευση</td>
            <td><a href="{{ url( '/admin/posts') }}" class="">Επεξεργασία Δημοσιεύσεων</a></td>
            <td></td>

          </tr>
          <tr>
            <td><strong>Χειροτεχνήματα</strong></td>
            <td>Νέο Χειροτέχνημα</td>
            <td>Επεξεργασία Χειροτεχνημάτων</td>
            <td></td>
          </tr>
          <tr>
            <td><strong>Εικόνες</strong></td>
            <td>
              <a href="#" data-toggle="modal" data-target="#uploadPicture" style="cursor: pointer;">
              Νέα Εικόνα
              </a>
            </td>
            <td><a href="{{ url('/photos') }}">Επεξεργασία Εικόνων</a></td>
            <td><a href="{{ url('/carousel') }}">Διαμόρφωση Carousel</a></td>
          </tr>
          <tr>
            <td><strong>Σχόλια</strong></td>
            <td></td>
            <td>Επεξεργασία Σχολίων</td>
            <td></td>
          </tr>
          <tr>
            <td><strong>Χρήστες</strong></td>
            <td></td>
            <td>Επεξεργασία Χρηστών</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

@include('layouts.self-destruct')

@endsection
