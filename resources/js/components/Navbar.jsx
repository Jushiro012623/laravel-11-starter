import {
    Navbar as Nav,
    NavbarBrand,
    NavbarContent,
    NavbarItem,
    Link,
    Button,
    DropdownItem,
    DropdownTrigger,
    Dropdown,
    DropdownMenu,
} from "@heroui/react";
import ThemeSwitch from "./ThemeSwitch";
import {
    AcmeLogo,
    Bread,
    ChevronDown,
    Coffee,
    Drinks,
    Pie,
    Rice,
    Snack,
} from "./ui/Icons";
import { useRoute } from "ziggy-js";

export default function Navbar() {
    const route = useRoute();

    const icons = {
        chevron: <ChevronDown fill="currentColor" size={16} />,
        coffee: <Coffee className="text-warning" fill="currentColor" size={30} />, 
        rice: <Rice className="text-warning" fill="currentColor" size={30} />,
        pie: <Pie className="text-warning" fill="currentColor" size={30} />,
        snack: <Snack className="text-success" fill="currentColor" size={30} />,
        bread: <Bread className="text-success" fill="currentColor" size={30} />,
        drink: <Drinks className="text-primary" fill="currentColor" size={30} />
    };

    return (
        <Nav className="h-32 border">
            <NavbarBrand>
                <AcmeLogo />
                <Link href="#" color="foreground">
                    <p className="font-bold text-inherit">ACME</p>
                </Link>
            </NavbarBrand>
            <NavbarContent className="hidden sm:flex gap-7" justify="center">
                <Dropdown>
                    <NavbarItem>
                        <DropdownTrigger>
                            <Button
                                disableRipple
                                className="p-0 bg-transparent data-[hover=true]:bg-transparent"
                                endContent={icons.chevron}
                                radius="sm"
                                variant="light"
                            >
                                Our Menu
                            </Button>
                        </DropdownTrigger>
                    </NavbarItem>
                    <DropdownMenu
                        aria-label="ACME Menus"
                        itemClasses={{
                            base: "gap-4",
                        }}
                    >
                        <DropdownItem
                            key="coffee"
                            description="Freshly brewed, high-quality coffee selections"
                            startContent={icons.coffee}
                        >
                            Coffee
                        </DropdownItem>
                        <DropdownItem
                            key="drinks"
                            description="Refreshing beverages without coffee"
                            startContent={icons.drink}
                        >
                            Non Coffee
                        </DropdownItem>
                        <DropdownItem
                            key="rice"
                            description="Hearty rice meals to satisfy your hunger"
                            startContent={icons.rice}
                        >
                            Rice Meal
                        </DropdownItem>
                        <DropdownItem
                            key="bread"
                            description="Freshly baked artisan breads"
                            startContent={icons.bread}
                        >
                            Breads
                        </DropdownItem>
                        <DropdownItem
                            key="snacks"
                            description="Tasty snacks for your cravings"
                            startContent={icons.snack}
                        >
                            Snacks
                        </DropdownItem>
                        <DropdownItem
                            key="pies"
                            description="Delicious sweet and savory pies"
                            startContent={icons.pie}
                        >
                            Pies
                        </DropdownItem>
                    </DropdownMenu>
                </Dropdown>
                <NavbarItem>
                    <Link href="#" color="foreground">
                        Rewards
                    </Link>
                </NavbarItem>
                <NavbarItem>
                    <Link color="foreground" href="#">
                        About Our Food
                    </Link>
                </NavbarItem>
                <NavbarItem>
                    <Link color="foreground" href="#">
                        Gift Cards
                    </Link>
                </NavbarItem>
            </NavbarContent>
            <NavbarContent justify="end">
                <NavbarItem>
                    <Button as={Link} color="warning" href="#" variant="ghost">
                        Order Now
                    </Button>
                </NavbarItem>
            </NavbarContent>
        </Nav>
    );
}
