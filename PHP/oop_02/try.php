<?php
function inverse()
{
    if(!$i)
    {
        throw new Exception('Делить на 0 нельзя');
    }
    return 1/$i;
}
try
{
    inverse(5);


}catch (Exception $e)
{
    echo $e->getMessage();
}finally
{
    echo'Сработало finally 1';
}

try
{

    inverse(0);

}catch (Exception $e)
{
    echo $e->getMessage();
}finally
{
    echo'Сработало finally 2';
}