<!doctype html>
<html>
    <head>
        <?php require_once('lib/inc.php'); ?>
        <meta charset="utf-8" />
        <title>SubFix</title>

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Convert subtitle files online. Now you can enjoy subtitles no matter what language you speak." />
        <link rel="stylesheet" href="<?= BASE_URL; ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />



        <link rel="apple-touch-icon" type="image/png" href="<?= BASE_URL; ?>favicon/apple-touch-icon.png" sizes="180x180" />
        <link rel="icon" type="image/png" href="<?= BASE_URL; ?>favicon/android-chrome-192x192.png" sizes="192x192" />
        <link rel="icon" type="image/png" href="<?= BASE_URL; ?>favicon/android-chrome-512x512.png" sizes="512x512" />
        <link rel="icon" type="image/x-icon" href="<?= BASE_URL; ?>favicon/favicon.ico" sizes="48x48" />
        <link rel="icon" type="image/png" href="<?= BASE_URL; ?>favicon/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="<?= BASE_URL; ?>favicon/favicon-32x32.png" sizes="32x32" />

    </head>
    <body>

        <div class="container">
            <div class="px-4 py-5 my-5 text-center">
                <img class="d-block mx-auto mb-4" src="<?= BASE_URL; ?>favicon/apple-touch-icon.png" alt="" width="120" height="120">
                <h1 class="display-5 fw-bold">SubFix</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="lead mb-4">
                        Quickly convert and resynchronize your subtitle files online. You can choose one of the following file formats for input/output:
                        <code>.srt</code>, 
                        <code>.vtt</code>, 
                        <code>.stl</code>, 
                        <code>.sbv</code>,
                        <code>.sub</code> (SubViewer and MicroDVD), 
                        <code>.ass</code>, 
                        <code>.dfxp</code>,
                        <code>.ttml</code>, 
                        <code>.smi</code>, 
                        <code>.qt.txt</code>, 
                        <code>.scc</code>, 
                        <code>.lrc</code>.
                    </p>

                    <form action="<?= BASE_URL; ?>convert.php" target="_blank" method="POST" enctype='multipart/form-data'>

                        <div class="row g-3 justify-content-md-center mb-4">
                            <div class="col-md-6">
                                <label for="input-file" class="form-label">Input File:</label>
                                <input type="file" name="input_file" id="input-file" class="form-control form-control-lg" />
                            </div>
                        </div>

                        <div class="row g-3 justify-content-md-center mb-4">
                            <div class="col-md-6">
                                <label for="resync-time" class="form-label">Resynchronize:</label>
                                <div class="input-group">
                                    <input type="text" name="resync_time" placeholder="-0.0" id="resync-time" class="form-control form-control-lg" />
                                    <span class="input-group-text">s</span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-md-center mb-4">
                            <div class="col-md-6">
                                <label for="output-format" class="form-label">Output Format:</label>
                                <select name="output_format" id="output-format" class="form-select form-select-lg">
                                    <option value="dfxp">.dfxp</option>
                                    <option value="srt">.srt</option>
                                    <option value="vtt">.vtt</option>
                                    <option value="stl">.stl (Spruce Technologies SubTitles)</option>
                                    <option value="sbv">.sbv</option>
                                    <option value="sub_subviewer">.sub (SubViewer)</option>
                                    <option value="sub_microdvd">.sub (MicroDVD)</option>
                                    <option value="ass">.ass</option>
                                    <option value="ttml">.ttml</option>
                                    <option value="smi">.smi</option>
                                    <option value="txt_quicktime">.qt.txt</option>
                                    <option value="scc">.scc</option>
                                    <option value="lrc">.lrc</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 justify-content-md-center">
                            <div class="d-grid col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-lg">Convert</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <script src="<?= BASE_URL; ?>js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="<?= BASE_URL; ?>vendor/twbs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
