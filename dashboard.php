<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'meta.php'; ?>

    <title>Mrpoke- Tableau de bord</title>
</head>

<body>
    <div class="content">
        <div class="dashboard">

            <div class="container">
                <div class="row mt-5">
                    <div class="col-sm-12 col-md-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-md-4">
                                        Bonjour Admin
                                    </div>
                                    <div class="col col-md-4">
                                        <a href="tickets.php" class="btn btn-success float-end">
                                            Tickets
                                        </a>
                                    </div>

                                    <div class="col col-md-4">
                                        <a href="api/action=logout" class="btn btn-danger float-end">
                                            Déconnexion
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Date</th>
                                        <th>Nom et prénoms</th>
                                        <th>Téléphone</th>
                                        <th>Ticket</th>
                                    </tr>

                                    <tr>
                                        <td>15/01/23</td>
                                        <td>Joh Doe</td>
                                        <td>068457564</td>
                                        <td>256845</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>