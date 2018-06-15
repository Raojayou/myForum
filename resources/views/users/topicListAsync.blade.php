<div class="col-md-8 col-md-offset-2">
    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover" id="topicsTable" style="visibility: hidden;">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Contenido</th>
                <th>Acciones</th>
            </tr>
            {{ csrf_field() }}
            </thead>
            <tbody>
            @foreach($topics as  $topic)
                <tr class="item{{$topic->id}}">

                    <td>{{$topic->title}}</td>
                    <td>{{$topic->category}}</td>
                    <td>{{$topic->content}}</td>

                    <td>
                        <button class="add-modal btn btn-success" data-id="{{$topic->id}}"
                                data-title="{{$topic->title}}" data-category="{{$topic->category}}"
                                data-content="{{$topic->content}}">
                            <span class="fas fa-plus"></span> Añadir
                        </button>
                        <button class="show-modal btn btn-info" data-id="{{$topic->id}}"
                                data-title="{{$topic->title}}" data-category="{{$topic->category}}"
                                data-content="{{$topic->content}}">
                            <span class="fa fa-eye"></span> Mostrar
                        </button>
                        <button class="edit-modal btn btn-warning" data-id="{{$topic->id}}"
                                data-title="{{$topic->title}}" data-category="{{$topic->category}}"
                                data-content="{{$topic->content}}">
                            <span class="fa fa-edit"></span> Editar
                        </button>
                        <!-- Trigger the modal with a button -->
                        <button name="btnModal" data-idTopic="{{$topic->id}}" type="button" class="btn btn-default btn-outline-dark"
                                data-toggle="modal">
                            <i class="fa fa-remove text-danger"></i> Borrar
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div><!-- /.panel-body -->
</div><!-- /.col-md-8 -->

<!-- Modal form to add a topic -->
<div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Título:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title_add" autofocus>
                            <small>Min: 2, Max: 50, only text</small>
                            <p class="errorTitle text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="category">Categoría:</label>
                        <div class="col-sm-10">
                            <select id="category" name="category" class="custom-select"
                                    title="Categoría del Tema">
                                <option selected value="">Ninguno seleccionado</option>
                                <option value="Discusión General">Discusión General</option>
                                <option value="Juegos en General">Juegos en General</option>
                                <option value="Software & Hardware">Software & Hardware</option>
                                <option value="Cine, Música & Televisión">Cine, Música &
                                    Televisión
                                </option>
                                <option value="Anime, Manga & Cómics">Anime, Manga & Cómics
                                </option>
                                <option value="Eventos">Eventos</option>
                                <option value="Xbox">Xbox</option>
                                <option value="PS4">PS4</option>
                                <option value="PC Gaming">PC Gaming</option>
                                <option value="Reporte de Errores">Reporte de Errores</option>
                            </select>
                            <p class="errorCategory text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="content">Content:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content_add" cols="40" rows="5"></textarea>
                            <small>Min: 2, Max: 500, only text</small>
                            <p class="errorContent text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success add" data-dismiss="modal">
                        <span id="" class='glyphicon glyphicon-check'></span> Add
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal form to show a topic -->
<div id="showModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_show" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title_show" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="category">Categoría:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="category_show" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="content">Content:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content_show" cols="40" rows="5" disabled></textarea>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal form to edit a form -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_edit" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Título:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title_edit" autofocus>
                            <p class="errorTitle text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="category">Categoría:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="category_edit" autofocus>
                            <p class="errorCategory text-center alert alert-danger hidden"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="content">Contenido:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content_edit" cols="40" rows="5"></textarea>
                            <p class="errorContent text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                        <span class='glyphicon glyphicon-check'></span> Edit
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal form to delete a form -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <!-- Modal header-->
            <h2 class="modal-header" style="padding:35px 50px;">
                Confirmar borrado de tema
            </h2>
            <!-- Modal body-->
            <div class="modal-body text-center">
                <p>
                    ¿Está seguro de querer borrar este tema?
                </p>
            </div>
            <!-- Modal footer-->
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-center"
                        data-dismiss="modal">
                    <i class="fa fa-remove text-light"></i> Cancelar
                </button>

                <button id="enviar" type="submit"
                        class="btn btn-success btn-default pull-center"
                        data-idTopicEnviar="">
                    <i class="fas fa-chevron-right text-light"></i> Aceptar
                </button>
                <!-- </form>-->
            </div>
        </div>
    </div>
</div>

@if($topics->isEmpty())
    <p>El usuario no ha creado ningún tema todavía.</p>
    <a class="btn btn-info" href="{{ url('/topics/create') }}">
        <i class="fas fa-plus text-light"></i> Añadir Tema</a>
@endif
<p></p>