<?php
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\Blog;
use yii\web\NotFoundHttpException;


/**
 * Blog controller
 */
class BlogController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $blogs = Blog::find()->andWhere(['status_id' => 1])->orderBy('sort');

        $dataProvider = new ActiveDataProvider([
            'query' => $blogs,
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('all', ['dataProvider' => $dataProvider]);
    }

    public function actionOne($url)
    {
        $blog = Blog::find()->andWhere(['url' => $url])->one();
        if($blog){
            return $this->render('one', ['blog' => $blog]);
        }
        throw new NotFoundHttpException('Такого блога нет...');
    }
}
