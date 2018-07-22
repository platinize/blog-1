<div>
    <h4>Добавить пост</h4>
    <div>
        <form method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title" class="col-md-4 control-label">Заголовок</label>
                <div>
                    <textarea class="form-control" id="title" rows='2' name="title" placeholder="Заголовок" autofocus>{{ $post->title }}</textarea>
                    <span style="color:red">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="summary" class="">Описание</label>
                <div class="col-md-6">
                    <textarea class="form-control" id="summary" rows='5' name="summary" placeholder="Описание" autofocus>{{ $post->summary }}</textarea>
                    <span style="color:red">{{ $errors->first('summary') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="body" class="col-md-4 control-label">Содержание</label>
                <div class="col-md-6">
                    <textarea class="form-control" id="body" rows='10' placeholder="Содержание" name="body" autofocus>{{ $post->body }}</textarea>
                    <span style="color:red">{{ $errors->first('body') }}</span>
                </div>
            </div>
            <div class="form-group">
                <input name="submit" type="submit" id="submit" class="submit" value="Опубликовать"/>
            </div>
        </form>
    </div>
</div>
