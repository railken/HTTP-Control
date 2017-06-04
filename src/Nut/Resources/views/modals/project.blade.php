<script type='text/template' name='project-remove'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header fluid">
                <h5 class="modal-title">Are you sure?</h5>
                <div class='fill'></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You can't go back.</p>
            </div>
            
            <form method='POST' class="modal-footer" name='projects.remove'>
                <input type='hidden' name='id' value='{project.id}'>
                <button type="submit" class="btn btn-primary" >Yes, remove</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                
            </form>
        </div>
    </div>
</script>

<script type='text/template' name='project-create'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header fluid">
                <h5 class="modal-title">Creating a project</h5>
                <div class='fill'></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='POST' class="modal-footer" name='projects.create'>

                    <input type='text' class='form-control' placeholder='Project name' name='name'>
                    <br>
                    <textarea class='form-control' placeholder='Project description' rows='10' name='description'></textarea>
                    <br>
                    <input type='hidden' name='team_id' value='{team.id}'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Create</button>
                    
                </form>
            </div>
        </div>
    </div>
</script>

<script type='text/template' name='project-update'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header fluid">
                <h5 class="modal-title">Editing a project</h5>
                <div class='fill'></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method='POST' class="modal-footer" name='projects.update'>

                    <input type='text' class='form-control' name='name' placeholder='Project name' value='{project.name}'>
                    <br>
                    <textarea class='form-control' placeholder='Project description' rows='10' name='description'>{project.description}</textarea>
                    <br>
                    <input type='hidden' name='id' value='{project.id}'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                    
                </form>
            </div>
            
        </div>
    </div>
</script>

<script type='text/template' name='project-change-avatar'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header fluid">
                <h5 class="modal-title">Updating a project</h5>
                <div class='fill'></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div data-team='avatar'><img src='{project.avatar}'></div>
                <hr>
                <form method='POST' class="modal-footer" name="projects.update">

                    <div style='display: none;min-height: 100px;' id='project-avatar-container'></div>
                    <input type='file' class='form-control' data-uploader-image data-input='#project-input-avatar' data-preview='#project-avatar-container'>
                    <input type='hidden' name='avatar' id='project-input-avatar'>
                    <input type='hidden' name='id' value='{project.id}'>
                    <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Save changes</button>
                    
                </form>
            </div>
            
        </div>
    </div>
</script>