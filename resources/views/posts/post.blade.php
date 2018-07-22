<div>
    <div class="post">
        <p class="post-title">{{ $post->title }}</p>
        <p class="summary">{{ $post->summary }}</p>
        <p class="body">{{ $post->body }}</p>
        <p>{{ count($post->likes) }}</p>
    </div>
</div>