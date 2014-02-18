<?php 
 
 
class CategoryController extends BaseController {
 
    public function returnCategoryTree($cat_id = 0) 
     {
        $categoryTree = array();

        $categories = Category::where('status',1)->where('parent_cat_id',$cat_id)->get();
        if($categories) 
        {
            foreach($categories as $category) 
            {
                $categoryTree[$category->id] = array(
                                                'title'=> $category->name,
                                                'key' => $category->id,
                                                //'children' => array_values($this->returnCategoryTree($category->id))
                                                'children' => $this->returnCategoryTree($category->id)
                                           );
                /*
                $children = $this->returnCategoryTree($category->id); // find children categories

                if($children) 
                {
                    $categoryTree[$category->id]['children'] = $children;
                }
            */
            }
        
        }
        return array_values(array_filter($categoryTree));
     }

    
    public function returnCategoryTreeJson() 
    {
        return Response::json(array_values($this->returnCategoryTree()));
    }

    public function categoryTreeJquery() 
    {
         return \View::make('tree_dev');
    }
}