@extend('_frontend.master')
@section('breadcrumb')
{{-- HTML::decode(Breadcrumbs::render('')) --}}
@stop
@section('content')
<div class="pages">
    <h2>Pályázatok</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Megnevezés</th>
                    <th>Feltöltés dátuma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>
                            <h3>{{HTML::linkRoute('oldalak.show',$page->menu,array('id'=>$page->id,'slug'=>$page->title))}}</h3>
                        </td>
                        <td>
                            {{$page->created_at}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center">
        {{$pages->links()}}
    </div>
</div>
@stop