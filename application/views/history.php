<?php 
include_once"header.php";
?>
        <style>
        .timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 50px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 15px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}

.timeline-badge span{
    padding: 3px 5px;
    border-radius: 5px;
}
.bgPurple{background: blueviolet;
    }
.bgGreen{background: #99FF99;
    }
.timeline-inverted{
	margin-top:10px;
	}
        </style>
        <section class="vc_rows wpb_rows vc_rows-fluid vc_custom_1488790902404" id="main-features">
            
<div class="container">
    <div class="page-header">
        <h2 id="timeline">CPPEx GLOBAL IN THE COURSE OF TIME</h2>
    </div>
    <ul class="timeline">
        <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i><span class="bgPurple"> 2005</span></div>
          <div class="timeline-panel bg-info">
            <div class="timeline-heading">
              <h4 class="timeline-title">Training & Consultancy</h4>
              <p><small class="text-muted"></small></p>
            </div>
            <div class="timeline-body">
              <p>Establishment of CPPEx GLOBAL</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i><span class="bgGreen"> 2008</span></div>
          <div class="timeline-panel bg-danger">
            <div class="timeline-heading">
              <h4 class="timeline-title">Started Certification</h4>
            </div>
            <div class="timeline-body">
              <p>Entry into the market of Europe</p>
             
            </div>
          </div>
        </li>


        <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i><span class="bgPurple"> 2010</span></div>
          <div class="timeline-panel bg-warning">
            <div class="timeline-heading">
              <h4 class="timeline-title">Started Certificaion</h4>
              <p><small class="text-muted"></small></p>
            </div>
            <div class="timeline-body">
             <p>Entry into the market of Middle East & Europe</p>
              </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i><span class="bgGreen"> 2015</span></div>
          <div class="timeline-panel bg-success">
            <div class="timeline-heading">
              <h4 class="timeline-title">Started Certification</h4>
            </div>
            <div class="timeline-body">
              <p>Entry into the market of South Americe</p>
             
            </div>
          </div>
        </li>


        <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i><span class="bgPurple"> 2017</span></div>
          <div class="timeline-panel bg-success">
            <div class="timeline-heading">
              <h4 class="timeline-title">Best Machine Operator Award</h4>
              <p><small class="text-muted"></small></p>
            </div>
            <div class="timeline-body">
             <p>Entry into the market of South Asia</p>
              </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i><span class="bgGreen"> 2021</span></div>
          <div class="timeline-panel bg-info">
            <div class="timeline-heading ">
              <h4 class="timeline-title">Plan to expand in the market of centeral asia</h4>
            </div>
            <div class="timeline-body">
             
            </div>
          </div>
        </li>
         <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i><span class="bgPurple"> 2025</span></div>
          <div class="timeline-panel bg-warning">
            <div class="timeline-heading ">
              <h4 class="timeline-title">Plan to expand in New Zealand & Australia</h4>
              <p><small class="text-muted"></small></p>
            </div>
            <div class="timeline-body">
              </div>
          </div>
        </li>
    </ul>
</div>
        </section>
        
<?php include_once"footer.php"; ?>