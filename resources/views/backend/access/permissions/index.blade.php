@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.permissions.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>{{ trans('labels.backend.access.permissions.management') }}</h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.permissions.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.permission-header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="permissions-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.access.permissions.table.permission') }}</th>
                            <th>{{ trans('labels.backend.access.permissions.table.display_name') }}</th>
                            <th>{{ trans('labels.backend.access.permissions.table.sort') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! history()->renderType('Permission') !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#permissions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.access.permission.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: '{{config('access.permissions_table')}}.name', render: $.fn.dataTable.render.text()},
                    {data: 'display_name', name: '{{config('access.permissions_table')}}.display_name', render: $.fn.dataTable.render.text()},
                    {data: 'sort', name: '{{config('access.permissions_table')}}.sort', render: $.fn.dataTable.render.text()},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[3, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop