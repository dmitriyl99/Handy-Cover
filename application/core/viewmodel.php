<?php 
    class Review 
    {
        private $id, $userName, $reviewText, $isShow;

        /**
         * @return mixed
         */
        public function getIsShow()
        {
            return $this->isShow;
        }

        /**
         * @param mixed $isShow
         */
        public function setIsShow($isShow): void
        {
            $this->isShow = $isShow;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getUserName()
        {
            return $this->userName;
        }

        /**
         * @param mixed $userName
         */
        public function setUserName($userName): void
        {
            $this->userName = $userName;
        }

        /**
         * @return mixed
         */
        public function getReviewText()
        {
            return $this->reviewText;
        }

        /**
         * @param mixed $reviewText
         */
        public function setReviewText($reviewText): void
        {
            $this->reviewText = $reviewText;
        }
    }

    class Product
    {
        private $id, $categoryId, $name, $catalogImage, $description, $sizes, $material, $productImages;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getCategoryId()
        {
            return $this->categoryId;
        }

        /**
         * @param mixed $categoryId
         */
        public function setCategoryId($categoryId): void
        {
            $this->categoryId = $categoryId;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * @param mixed $description
         */
        public function setDescription($description): void
        {
            $this->description = $description;
        }

        /**
         * @return mixed
         */
        public function getSizes()
        {
            return $this->sizes;
        }

        /**
         * @param mixed $sizes
         */
        public function setSizes($sizes): void
        {
            $this->sizes = $sizes;
        }

        /**
         * @return mixed
         */
        public function getMaterial()
        {
            return $this->material;
        }

        /**
         * @param mixed $material
         */
        public function setMaterial($material): void
        {
            $this->material = $material;
        }

        /**
         * @return mixed
         */
        public function getProductImages()
        {
            return $this->productImages;
        }

        /**
         * @param mixed $productImages
         */
        public function setProductImages($productImages): void
        {
            $this->productImages = $productImages;
        }

        /**
         * @return mixed
         */
        public function getCatalogImage()
        {
            return $this->catalogImage;
        }

        /**
         * @param mixed $catalogImage
         */
        public function setCatalogImage($catalogImage): void
        {
            $this->catalogImage = $catalogImage;
        }
    }

    class ImageProduct
    {
        private $id, $productId, $color, $image, $price;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getProductId()
        {
            return $this->productId;
        }

        /**
         * @param mixed $productId
         */
        public function setProductId($productId): void
        {
            $this->productId = $productId;
        }

        /**
         * @return mixed
         */
        public function getColor()
        {
            return $this->color;
        }

        /**
         * @param mixed $color
         */
        public function setColor($color): void
        {
            $this->color = $color;
        }

        /**
         * @return mixed
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * @param mixed $image
         */
        public function setImage($image): void
        {
            $this->image = $image;
        }

        /**
         * @return mixed
         */
        public function getPrice()
        {
            return $this->price;
        }

        /**
         * @param mixed $price
         */
        public function setPrice($price): void
        {
            $this->price = $price;
        }
    }

    class Category
    {
        private $id, $name, $image, $parent_id;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * @param mixed $image
         */
        public function setImage($image): void
        {
            $this->image = $image;
        }

        /**
         * @return mixed
         */
        public function getParentId()
        {
            return $this->parent_id;
        }

        /**
         * @param mixed $parent_id
         */
        public function setParentId($parent_id): void
        {
            $this->parent_id = $parent_id;
        }

        public function isSubCategory() : bool
        {
            return isset($this->parent_id);
        }

    }

    class Phone
    {
        private $id, $phoneNumber;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getPhoneNumber()
        {
            return $this->phoneNumber;
        }

        /**
         * @param mixed $phoneNumber
         */
        public function setPhoneNumber($phoneNumber): void
        {
            $this->phoneNumber = $phoneNumber;
        }
    }

    class Vacancy
    {
        private $id, $name, $demands;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getDemands()
        {
            return $this->demands;
        }

        /**
         * @param mixed $demands
         */
        public function setDemands($demands): void
        {
            $this->demands = $demands;
        }

    }

    class CatalogProduct
    {
        private $id, $name, $image;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * @return mixed
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * @param mixed $image
         */
        public function setImage($image): void
        {
            $this->image = $image;
        }
    }

    class AdminUser
    {
        private $email, $password;

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password): void
        {
            $this->password = $password;
        }

    }

    class BaseViewModel
    {
        private $title;
        private $contacts;

        /**
         * @return mixed
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param mixed $title
         */
        public function setTitle($title): void
        {
            $this->title = $title;
        }

        /**
         * @return mixed
         */
        public function getContacts()
        {
            return $this->contacts;
        }

        /**
         * @param mixed $contacts
         */
        public function setContacts($contacts): void
        {
            $this->contacts = $contacts;
        }
    }
    
    class HomePageViewModel extends BaseViewModel
    {
        private $company_description, $reviews;

        function __construct($company_description, $reviews)
        {
            $this->company_description = $company_description;
            $this->reviews = $reviews;
        }

        public function get_company_description() 
        {
            return $this->company_description;
        }

        public function get_reviews() 
        {
            return $this->reviews;
        }
    }

    class CatalogPageViewModel extends BaseViewModel
    {
        private $categories;

        /**
         * @return mixed
         */
        public function getCategories() : array
        {
            return $this->categories;
        }

        /**
         * @param mixed $categories
         */
        public function setCategories($categories): void
        {
            $this->categories = $categories;
        }
    }

    class ParentCategoryCatalogPageViewModel extends BaseViewModel
    {
        private $parentCategory, $subCategories;

        /**
         * @return mixed
         */
        public function getParentCategory() : Category
        {
            return $this->parentCategory;
        }

        /**
         * @param mixed $parentCategory
         */
        public function setParentCategory($parentCategory): void
        {
            $this->parentCategory = $parentCategory;
        }

        /**
         * @return mixed
         */
        public function getSubCategories()
        {
            return $this->subCategories;
        }

        /**
         * @param mixed $subcategories
         */
        public function setSubCategories($subcategories): void
        {
            $this->subCategories = $subcategories;
        }
    }

    class SubCatalogPageViewModel extends BaseViewModel
    {
        private $products, $category, $parentCategory;

        /**
         * @return mixed
         */
        public function getProducts() : array
        {
            return $this->products;
        }

        /**
         * @param mixed $products
         */
        public function setProducts($products): void
        {
            $this->products = $products;
        }

        /**
         * @return mixed
         */
        public function getCategory() : Category
        {
            return $this->category;
        }

        /**
         * @param mixed $category
         */
        public function setCategory($category): void
        {
            $this->category = $category;
        }

        /**
         * @return mixed
         */
        public function getParentCategory() : Category
        {
            return $this->parentCategory;
        }

        /**
         * @param mixed $parentCategory
         */
        public function setParentCategory($parentCategory): void
        {
            $this->parentCategory = $parentCategory;
        }
    }

    class ContactsPageViewModel extends BaseViewModel
    {
        private $phones, $address, $email;

        /**
         * @return mixed
         */
        public function getPhones()
        {
            return $this->phones;
        }

        /**
         * @param mixed $phones
         */
        public function setPhones($phones): void
        {
            $this->phones = $phones;
        }

        /**
         * @return mixed
         */
        public function getAddress()
        {
            return $this->address;
        }

        /**
         * @param mixed $address
         */
        public function setAddress($address): void
        {
            $this->address = $address;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }
    }

    class ProductPageViewModel extends BaseViewModel
    {
        private $product;
        private $parentCategory;
        private $subCategory;

        /**
         * @return mixed
         */
        public function getProduct()
        {
            return $this->product;
        }

        /**
         * @param mixed $product
         */
        public function setProduct($product): void
        {
            $this->product = $product;
        }

        /**
         * @return mixed
         */
        public function getParentCategory()
        {
            return $this->parentCategory;
        }

        /**
         * @param mixed $parentCategory
         */
        public function setParentCategory($parentCategory): void
        {
            $this->parentCategory = $parentCategory;
        }

        /**
         * @return mixed
         */
        public function getSubCategory()
        {
            return $this->subCategory;
        }

        /**
         * @param mixed $subCategory
         */
        public function setSubCategory($subCategory): void
        {
            $this->subCategory = $subCategory;
        }

    }

    class VacanciesPageViewModel extends BaseViewModel {
        private $vacancies;

        /**
         * @return mixed
         */
        public function getVacancies()
        {
            return $this->vacancies;
        }

        /**
         * @param mixed $vacancies
         */
        public function setVacancies($vacancies): void
        {
            $this->vacancies = $vacancies;
        }
    }