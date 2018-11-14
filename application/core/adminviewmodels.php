<?php

    class AdminBaseViewModel
    {
        private $title;
        private $page;
        private $userName;

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
        public function getPage()
        {
            return $this->page;
        }

        /**
         * @param mixed $page
         */
        public function setPage($page): void
        {
            $this->page = $page;
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
    }

    class AdminCatalogViewModel extends AdminBaseViewModel
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

    class AdminParentCatalogViewModel extends AdminBaseViewModel
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

    class AdminSubCatalogViewModel extends AdminBaseViewModel
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

    class AdminCreateCategoryViewModel extends AdminBaseViewModel
    {
        private $parentCategories;
        private $parentcategoryId;
        private $returnUrl;

        /**
         * @return mixed
         */
        public function getParentCategories()
        {
            return $this->parentCategories;
        }

        /**
         * @param mixed $parentCategories
         */
        public function setParentCategories($parentCategories): void
        {
            $this->parentCategories = $parentCategories;
        }

        /**
         * @return mixed
         */
        public function getParentcategoryId()
        {
            return $this->parentcategoryId;
        }

        /**
         * @param mixed $parentcategoryId
         */
        public function setParentcategoryId($parentcategoryId): void
        {
            $this->parentcategoryId = $parentcategoryId;
        }

        /**
         * @return mixed
         */
        public function getReturnUrl()
        {
            return $this->returnUrl;
        }

        /**
         * @param mixed $returnUrl
         */
        public function setReturnUrl($returnUrl): void
        {
            $this->returnUrl = $returnUrl;
        }
    }

    class AdminEditCategoryViewModel extends AdminBaseViewModel
    {
        private $id;
        private $name;
        private $image;
        private $parentId;
        private $categories;
        private $returnUrl;

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
            return $this->parentId;
        }

        /**
         * @param mixed $parentId
         */
        public function setParentId($parentId): void
        {
            $this->parentId = $parentId;
        }

        /**
         * @return mixed
         */
        public function getCategories()
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

        /**
         * @return mixed
         */
        public function getReturnUrl()
        {
            return $this->returnUrl;
        }

        /**
         * @param mixed $returnUrl
         */
        public function setReturnUrl($returnUrl): void
        {
            $this->returnUrl = $returnUrl;
        }
    }

    class AdminCreateProductViewModel extends AdminBaseViewModel
    {
        private $categoryId;
        private $categories;
        private $returnUrl;

        /**
         * @return mixed
         */
        public function getCategoryId()
        {
            return $this->categoryId;
        }

        /**
         * @param mixed $category
         */
        public function setCategoryId($category): void
        {
            $this->categoryId = $category;
        }

        /**
         * @return mixed
         */
        public function getCategories()
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

        /**
         * @return mixed
         */
        public function getReturnUrl()
        {
            return $this->returnUrl;
        }

        /**
         * @param mixed $returnUrl
         */
        public function setReturnUrl($returnUrl): void
        {
            $this->returnUrl = $returnUrl;
        }
    }

    class AdminEditProductViewModel extends AdminBaseViewModel
    {
        private $product;
        private $categories;
        private $returnUrl;

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
        public function getReturnUrl()
        {
            return $this->returnUrl;
        }

        /**
         * @param mixed $returnUrl
         */
        public function setReturnUrl($returnUrl): void
        {
            $this->returnUrl = $returnUrl;
        }

        /**
         * @return mixed
         */
        public function getCategories()
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

    class AdminReviewsViewModel extends AdminBaseViewModel
    {
        private $reviews;

        /**
         * @return mixed
         */
        public function getReviews()
        {
            return $this->reviews;
        }

        /**
         * @param mixed $reviews
         */
        public function setReviews($reviews): void
        {
            $this->reviews = $reviews;
        }

    }

    class AdminVacanciesViewModel extends AdminBaseViewModel
    {
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

    class AdminVacancyViewModel extends AdminBaseViewModel
    {
        private $vacancy;

        /**
         * @return mixed
         */
        public function getVacancy()
        {
            return $this->vacancy;
        }

        /**
         * @param mixed $vacancy
         */
        public function setVacancy($vacancy): void
        {
            $this->vacancy = $vacancy;
        }
    }

    class AdminContactsViewModel extends AdminBaseViewModel {
        private $phones, $socialLinks, $address, $email;

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
        public function getSocialLinks()
        {
            return $this->socialLinks;
        }

        /**
         * @param mixed $socialLinks
         */
        public function setSocialLinks($socialLinks): void
        {
            $this->socialLinks = $socialLinks;
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

    class AdminParentCategory {
        private $name, $subCategories;

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
        public function getSubCategories()
        {
            return $this->subCategories;
        }

        /**
         * @param mixed $subCategories
         */
        public function setSubCategories($subCategories): void
        {
            $this->subCategories = $subCategories;
        }
    }

    class AdminSubCategory {
        private $id, $name;

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
    }