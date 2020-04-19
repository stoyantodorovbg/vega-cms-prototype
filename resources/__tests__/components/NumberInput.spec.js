import { mount } from "@vue/test-utils";
import NumberInput from "../../js/components/filters/NumberFilterInput";

describe('NumberInput Component', () => {
  test("should mount without crashing", () => {
    const wrapper = mount(NumberInput);

    expect(NumberInput).toMatchSnapshot();
  });
});
