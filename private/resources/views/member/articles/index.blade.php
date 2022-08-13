<?php
/**
 * @var \Illuminate\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder|\App\Article[] $articles
 */
?>

@extends('layouts.member')

@section('title', e(__('Manage Article')))

@section('content')

    <div class="card mb-3">
        <div class="card-body">
            {!! Form::open([
                'route' => 'member.articles.index',
                'class' => 'form-inline',
                'method' => 'get'
            ]) !!}

            <div class="form-row">
                <div class="col">
                    {{ Form::text('Filter[title]', old('Filter[title]', request()->input('Filter.title')),
                        ['class' => 'form-control form-control-sm', 'placeholder' => __('Title')]) }}
                </div>

                <div class="col">
                    {{ Form::select('Filter[status]', get_article_statuses(), old('Filter[status]', request()->input('Filter.status')),
                        ['placeholder' => __('Status'), 'class' => 'form-control form-control-sm']) }}
                </div>

                <div class="col">
                    {{ Form::submit(__('Submit'), ['class' => 'btn btn-outline-primary btn-sm']) }}
                </div>

                <div class="col">
                    <a href="{{ route('member.articles.index') }}" class="btn btn-link btn-sm p-0">{{__('Reset')}}</a>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    <div class="card">
        <div class="card-body p-0">

            <table class="table table-responsive-sm table-striped">
                <thead class="thead-light">
                <tr>
                    <th>
                        {!! link_to_route('member.articles.index', __('Id'),
                        array_merge(request()->query(), ['order' => 'id', 'dir' => $orderBy['dir'], 'page' => 1]) ) !!}
                    </th>
                    <th>
                        {!! link_to_route('member.articles.index', __('Title'),
                        array_merge(request()->query(), ['order' => 'title', 'dir' => $orderBy['dir'], 'page' => 1]) ) !!}
                    </th>
                    <th class="text-center" style="min-width: 120px">{{ __('Status') }}</th>
                    <th>{{ __('Article Link') }}</th>
                    <th>{{ __('Updated') }}</th>
                    {{-- <th>
                        {!! link_to_route('member.articles.index', __('Published'),
                        array_merge(request()->query(), ['order' => 'published_at', 'dir' => $orderBy['dir'], 'page' => 1]) ) !!}
                    </th> --}}
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>

                <!-- Here is where we loop through our $posts array, printing out post info -->

                
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>
                            <a href="{{ route('member.articles.edit', [$article->id]) }}">{{ $article->title }}</a>
                        </td>
                        <td class="text-center" style="width:240px">
                            <!--------------- Approved ------------------->
                            @if ( $article->status == 1 )
                                <div class="status-box success"> <i class="fas fa-check"></i> Approved </div>
                            @elseif( $article->status == 3 || $article->status == 6 )
                                <div class="status-box pendding"> <i class="fas fa-spinner"></i> Under review </div>
                            @elseif( $article->status == 4 )
                                <div class="status-box pendding"> <i class="fas fa-spinner"></i> Under review </div>
                            @elseif( $article->status == 5 )
                                <div class="status-box danger"> <i class="fas fa-exclamation-triangle"></i>
                                    Need improvement
                                    <br> 
                                    <u> <a class="need_improvement text-white" href="#" article_id="{{ $article->id }}" review_messege="{{ $article->review_messege }}"> More Info </a> </u>
                                </div>
                            @endif
                        </td>
                        @php
                            if( $article->lang == "english" ){
                                $site = 'https://jourlive.com/';
                            }else{
                                $site = 'https://alnhrdh.com/';
                            }
                        @endphp
                        <td> 
                            @if( $article->status == 1 )
                                <a href="{{ $site . "" . get_article_statuses($article->slug)}}-{{get_article_statuses($article->id)}}" target="_blank" >  {{ $site . "" . get_article_statuses($article->slug)}} </a> 
                            @endif

                        </td>
                        <td>{{ display_date_timezone($article->updated_at) }}</td>
                        {{-- <td>{{ display_date_timezone($article->published_at) }}</td> --}}
                        <td>
                            <div class="d-inline-flex">
                                <a class="btn btn-sm btn-primary" target="_blank" href="{{ $article->permalink() }}" style="display: none">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-sm btn-info"
                                   href="{{ route('member.articles.edit', [$article->id]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>

                                
                            </div>
                        </td>
                    </tr>
                @endforeach
                @php unset($article); @endphp
            </table>

            <div class="table-responsive">
                {{ $articles->appends(request()->except(['page']))->links() }}
            </div>

        </div><!-- /.box-body -->
    </div>

@endsection
