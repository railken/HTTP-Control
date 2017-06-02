<header class='fluid'>

</header>

<section class='full-height container-left-side'>
    <div class='side-left'>
        <div class='container-left-side-top'>
            <button class='btn btn-primary' data-toggle="modal" data-target="#project-create">new project</button>
        </div>
        <nav class='full-height nav-projects'>


        </nav>
    </div>

</section>

<div class="modal fade modal-small" id='project-delete'>
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
            
            <form method='POST' class="modal-footer projects-delete">
                <input type='hidden' name='id' value=''>
                <button type="submit" class="btn btn-primary" >Yes, delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                
            </form>
        </div>
    </div>
</div>


<div class="modal fade modal-small" id='project-create'>
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
                <form method='POST' class="modal-footer" name='projects-create'>

                    <input type='text' class='form-control'  placeholder='Project name' name='name'>
                    <br>
                    <textarea class='form-control' placeholder='Project description' rows='10' name='description'></textarea>
                    <br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Create</button>
                    
                </form>
            </div>
            
        </div>
    </div>
</div>


<div class="modal fade modal-small" id='project-form'>
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
                <form method='POST' class="modal-footer projects-form">

                    <input type='text' class='form-control'  placeholder='Project name'>
                    <br>
                    <textarea class='form-control' placeholder='Project description'></textarea>
                    <br>
                    <input type='hidden' name='id' value=''>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" >Create</button>
                    
                </form>
            </div>
            
        </div>
    </div>
</div>