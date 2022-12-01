<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<section class="mt-4 mb-5" id="dashboard">
    <div class="row card-container">
        <div class="col-md-12 mt-4">
            <div class="card mb-2">
                <div class="card-header p-3 pt-2">
                    <a class="btn" href="/" type="button">Tambah Data</a>
                </div>
                <!-- <hr class="dark horizontal my-0"> -->
                <div class="content">
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 50px !important;">No.</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Sales Assistant</td>
                                        <td>San Francisco</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Integration Specialist</td>
                                        <td>Tokyo</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Javascript Developer</td>
                                        <td>San Francisco</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Software Engineer</td>
                                        <td>Edinburgh</td>

                                    <tr>
                                        <td>11</td>
                                        <td>Office Manager</td>
                                        <td>London</td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>Support Lead</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                    <tr>
                                        <td>13</td>
                                        <td>Regional Director</td>
                                        <td>San Francisco</td>
                                    </tr>
                                    <tr>
                                        <td>14</td>
                                        <td>Senior Marketing Designer</td>
                                        <td>London</td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>Regional Director</td>
                                        <td>London</td>
                                    </tr>
                                    <tr>
                                        <td>16</td>
                                        <td>Marketing Designer</td>
                                        <td>London</td>
                                    </tr>
                                    <tr>
                                        <td>17</td>
                                        <td>Chief Financial Officer (CFO)</td>
                                        <td>New York</td>
                                    </tr>
                                    <tr>
                                        <td>18</td>
                                        <td>Systems Administrator</td>
                                        <td>New York</td>
                                    </tr>
                                    <tr>
                                        <td>19</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                    </tr>
                                    <tr>
                                        <td>20</td>
                                        <td>Personnel Lead</td>
                                        <td>Edinburgh</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>