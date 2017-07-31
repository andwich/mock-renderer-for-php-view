<?php
namespace andwich;

class MockPages
{
    public static function getPageInfo($mockdataPath)
    {
        $mockdataStr = file_get_contents($mockdataPath);

        preg_match('/.+\/(.+)\.json/', $mockdataPath, $id);
        preg_match('/(\/\/ #NAME\s*: )(.*|$)/', $mockdataStr, $name);
        preg_match('/(\/\/ #STATE\s*: )(.*|$)/', $mockdataStr, $state);
        preg_match('/(\/\/ #NOTE\s*: )(.*|$)/', $mockdataStr, $note);

        return [
            'id' => @$id[1] ?: '',
            'name' => @$name[2] ?: '',
            'state' => @$state[2] ?: '',
            'note' => @$note[2] ?: '',
        ];
    }

    public static function getPages($mockdataDir)
    {
        if (is_dir($mockdataDir) && $handle = opendir($mockdataDir))
        {
            $pages = [];
            while (($mockdataFile = readdir($handle)) !== false)
            {
                if (preg_match('/^\..*/', $mockdataFile))
                {
                    continue;
                }

                $mockdataPath = $mockdataDir . $mockdataFile;
                if (filetype($mockdataPath) == 'file')
                {
                    $pageInfo = self::getPageInfo($mockdataPath);
                    $pageInfo['mock'] = $mockdataFile;
                    array_push($pages, $pageInfo);
                }
            }
            return $pages;
        }
    }
}

$d = ['pages' => MockPages::getPages(dirname(__FILE__) . '/mock/')];
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Pages</title>
  <style>
    html {
      font-family: sans-serif;
      color: #333;
    }
    a {
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    table {
      border-spacing: 0;
      border-collapse: collapse;
    }
    thead {
      font-size: 10px;
    }
    thead th {
      text-align: left;
    }
    tbody {
      font-size: 14px;
    }
    tbody tr {
      border-top: solid 1px #e5e5e5;
    }
    tbody tr:first-child {
      border-top: solid 2px #e5e5e5;
    }
    tbody tr:nth-child(odd) {
      background-color: #fafafa;
    }
    td {
      padding: 8px 32px 8px 8px;
      white-space: nowrap;
    }
    th {
      padding: 8px 32px 8px 8px;
      position: relative;
    }
  </style>
</head>

<body style="padding:20px;">
  <h1>Pages</h1>

  <div style="padding-bottom:16px; overflow-x:auto;">
    <table width="100%">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>STATE</th>
          <th>NOTE</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($d['pages'] as $key => $val): ?>
          <tr>
            <td>
              <a href="./?mock=<?= $val['mock'] ?>" target="preview">
                <?= $val['id'] ?>
              </a>
            </td>
            <td><?= $val['name'] ?></td>
            <td><?= $val['state'] ?></td>
            <td><?= $val['note'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
