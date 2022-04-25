@extends('layouts.main')
@section('content')
<section class="story-sec">
    <div class="container">
        	<?=html_entity_decode($storydetail->content)?>
    </div>
</section>
@endsection
@section('css')
<style>
</style>
@endsection
@section('js')
<script type="text/javascript"></script>
@endsection