@extends('layouts.admin')
@section('h1')
    <h1 class="mt-3">Menú</h1>
@endsection
@section('content')
    <div class="container">
        <div class="alert alert-success" style="display:none"></div>
        <table class="table table-sm table-striped table-bordered">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th>Sub Menú</th>
            </tr>
            </thead>
            <tbody>
            @foreach($menu as $item)
                <tr>
                    <td class="form-check-inline">
                        <input class="form-check-input"
                               type="checkbox"
                               @if($item->active) checked @endif
                               name="{{$item->name}}"
                               data-type="menu"
                               id="{{$item->id}}">
                        <label class="form-check-label" for="{{$item->id}}">{{$item->name}}</label>
                    </td>
                    <td>
                        @if($item->subMenus()->exists())
                            <ul>
                                @foreach($item->subMenus as $subMenu)
                                    <li class="form-check">
                                        <input type="checkbox"
                                               class="form-check-input"
                                               @if($subMenu->active) checked @endif
                                               name="{{$subMenu->name}}"
                                               data-type="submenu"
                                               id="{{$subMenu->id}}">
                                        <label class="form-check-label" for="{{$subMenu->id}}">{{$subMenu->name}}</label>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             <span class="text-muted">Sin submenus</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $("input:checkbox").change(function() {
                let input = $(this);
                let isChecked = input.is(":checked") ? 1:0;
                $.ajax({
                    url: '{{route('admin.update')}}',
                    type: 'POST',
                    data: { id:input.attr("id"), value:isChecked, menuType : input.data('type') },
                    success: function (result) {
                        $('.alert').show(500).delay(5000).queue(function(n) {
                            $(this).hide(500); n();
                        });
                        $('.alert').html(result.success);
                    }
                });
            });
        });
    </script>
@endsection
